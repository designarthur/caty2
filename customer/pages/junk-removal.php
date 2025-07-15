<?php
// customer/pages/junk_removal.php

// Ensure session is started and user is logged in
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/session.php';
require_once __DIR__ . '/../../includes/functions.php'; // Required for CSRF token generation

if (!is_logged_in()) {
    echo '<div class="text-red-500 text-center p-8">You must be logged in to view this content.</div>';
    exit;
}

generate_csrf_token();
$csrf_token = $_SESSION['csrf_token'];

$user_id = $_SESSION['user_id'];
$junk_removal_requests = [];
$junk_detail_view_data = null; // To hold data for a single junk removal detail view if requested

// --- Pagination & Filter Variables ---
$items_per_page_options = [10, 25, 50, 100];
$items_per_page = filter_input(INPUT_GET, 'per_page', FILTER_VALIDATE_INT);
if (!in_array($items_per_page, $items_per_page_options)) {
    $items_per_page = 25; // Default items per page
}

$current_page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
if (!$current_page || $current_page < 1) {
    $current_page = 1;
}
$offset = ($current_page - 1) * $items_per_page;

$filter_status = $_GET['status'] ?? 'all'; // Default filter status
$search_query = trim($_GET['search'] ?? ''); // Search query
$start_date_filter = $_GET['start_date'] ?? '';
$end_date_filter = $_GET['end_date'] ?? '';

// Check if a specific quote ID is requested for detail view
$requested_quote_id_for_detail = filter_input(INPUT_GET, 'quote_id', FILTER_VALIDATE_INT);

// Fetch specific junk removal request details if an ID is provided
if ($requested_quote_id_for_detail) {
    $stmt_detail = $conn->prepare("SELECT
                                    q.id AS quote_id,
                                    q.status,
                                    q.created_at,
                                    q.location,
                                    q.removal_date,
                                    q.removal_time,
                                    q.live_load_needed,
                                    q.is_urgent,
                                    q.driver_instructions,
                                    q.quoted_price,
                                    jrd.junk_items_json,
                                    jrd.recommended_dumpster_size,
                                    jrd.additional_comment,
                                    jrd.media_urls_json
                                FROM
                                    quotes q
                                JOIN
                                    junk_removal_details jrd ON q.id = jrd.quote_id
                                WHERE
                                    q.user_id = ? AND q.service_type = 'junk_removal' AND q.id = ?");
    $stmt_detail->bind_param("ii", $user_id, $requested_quote_id_for_detail);
    $stmt_detail->execute();
    $result_detail = $stmt_detail->get_result();
    if ($result_detail->num_rows > 0) {
        $junk_detail_view_data = $result_detail->fetch_assoc();
        $junk_detail_view_data['junk_items_json'] = json_decode($junk_detail_view_data['junk_items_json'] ?? '[]', true); // Ensure it's an array
        $junk_detail_view_data['media_urls_json'] = json_decode($junk_detail_view_data['media_urls_json'] ?? '[]', true); // Ensure it's an array
    }
    $stmt_detail->close();
} else {
    // --- Fetch all junk removal requests for the current user for the list view with Filters, Search, and Pagination ---
    $base_query = "
        FROM quotes q
        JOIN junk_removal_details jrd ON q.id = jrd.quote_id
        WHERE q.user_id = ? AND q.service_type = 'junk_removal'
    ";

    $where_clauses = [];
    $params = [$user_id];
    $types = "i";

    // Status Filter
    if ($filter_status !== 'all') {
        $where_clauses[] = "q.status = ?";
        $params[] = $filter_status;
        $types .= "s";
    }

    // Search Query (Quote ID, Location, or Junk Item Description)
    if (!empty($search_query)) {
        $search_term = '%' . $search_query . '%';
        $where_clauses[] = "(CAST(q.id AS CHAR) LIKE ? OR q.location LIKE ? OR jrd.junk_items_json LIKE ?)";
        $params[] = $search_term;
        $params[] = $search_term;
        $params[] = $search_term;
        $types .= "sss";
    }

    // Date Range Filter
    if (!empty($start_date_filter)) {
        $where_clauses[] = "DATE(q.created_at) >= ?";
        $params[] = $start_date_filter;
        $types .= "s";
    }
    if (!empty($end_date_filter)) {
        $where_clauses[] = "DATE(q.created_at) <= ?";
        $params[] = $end_date_filter;
        $types .= "s";
    }

    $where_sql = '';
    if (!empty($where_clauses)) {
        $where_sql = " AND " . implode(" AND ", $where_clauses);
    }

    // Get total count for pagination
    $stmt_count = $conn->prepare("SELECT COUNT(*) " . $base_query . $where_sql);
    if (!empty($params)) {
        $stmt_count->bind_param($types, ...$params);
    }
    $stmt_count->execute();
    $total_requests_count = $stmt_count->get_result()->fetch_assoc()['COUNT(*)'];
    $stmt_count->close();

    $total_pages = ceil($total_requests_count / $items_per_page);

    // Main query for requests list
    $list_query = "
        SELECT
            q.id AS quote_id,
            q.status,
            q.created_at,
            q.location,
            q.removal_date,
            jrd.junk_items_json,
            jrd.recommended_dumpster_size,
            jrd.additional_comment
    " . $base_query . $where_sql . "
    ORDER BY q.created_at DESC
    LIMIT ? OFFSET ?";

    $params[] = $items_per_page;
    $params[] = $offset;
    $types .= "ii"; // Add types for LIMIT and OFFSET

    $stmt_list = $conn->prepare($list_query);
    if (!empty($params)) {
        $stmt_list->bind_param($types, ...$params);
    }
    $stmt_list->execute();
    $result_list = $stmt_list->get_result();
    while ($row = $result_list->fetch_assoc()) {
        $row['junk_items_json'] = json_decode($row['junk_items_json'], true);
        $junk_removal_requests[] = $row;
    }
    $stmt_list->close();
}

$conn->close();

// Function to get status badge classes
function getStatusBadgeClass($status) {
    switch ($status) {
        case 'pending':
            return 'bg-yellow-100 text-yellow-700';
        case 'quoted':
            return 'bg-blue-100 text-blue-700';
        case 'accepted':
        case 'converted_to_booking':
            return 'bg-green-100 text-green-700';
        case 'rejected':
        case 'cancelled':
            return 'bg-red-100 text-red-700';
        case 'customer_draft':
            return 'bg-gray-200 text-gray-700';
        default:
            return 'bg-gray-100 text-gray-700';
    }
}
?>

<h1 class="text-3xl font-bold text-gray-800 mb-8">Junk Removal Services</h1>

<div class="bg-white p-6 rounded-lg shadow-md border border-blue-200 mb-8 text-center <?php echo $junk_detail_view_data ? 'hidden' : ''; ?>" id="junk-removal-intro-section">
    <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center justify-center"><i class="fas fa-robot mr-2 text-teal-600"></i>Start a New Junk Removal Request</h2>
    <p class="text-gray-600 mb-4">Click the button below to chat with our AI assistant and quickly arrange your next junk removal service.</p>
    <button class="py-3 px-6 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200 shadow-lg" onclick="showAIChat('junk-removal-service');">
        <i class="fas fa-comments mr-2"></i>Launch AI Junk Removal Chat
    </button>
</div>

<div class="bg-white p-6 rounded-lg shadow-md border border-blue-200 <?php echo $junk_detail_view_data ? 'hidden' : ''; ?>" id="junk-removal-list">
    <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center"><i class="fas fa-history mr-2 text-blue-600"></i>Your Past Junk Removal Requests</h2>
    
    <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <label for="status-filter" class="text-sm font-medium text-gray-700">Status:</label>
            <select id="status-filter" onchange="window.applyJunkRemovalFilters()"
                    class="p-2 border border-gray-300 rounded-md text-sm">
                <option value="all" <?php echo $filter_status === 'all' ? 'selected' : ''; ?>>All</option>
                <option value="customer_draft" <?php echo $filter_status === 'customer_draft' ? 'selected' : ''; ?>>Draft</option>
                <option value="pending" <?php echo $filter_status === 'pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="quoted" <?php echo $filter_status === 'quoted' ? 'selected' : ''; ?>>Quoted</option>
                <option value="accepted" <?php echo $filter_status === 'accepted' ? 'selected' : ''; ?>>Accepted</option>
                <option value="rejected" <?php echo $filter_status === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                <option value="converted_to_booking" <?php echo $filter_status === 'converted_to_booking' ? 'selected' : ''; ?>>Converted to Booking</option>
            </select>
        </div>

        <div class="flex items-center gap-2">
            <label for="start-date-filter" class="text-sm font-medium text-gray-700">From:</label>
            <input type="date" id="start-date-filter" value="<?php echo htmlspecialchars($start_date_filter); ?>"
                   class="p-2 border border-gray-300 rounded-md text-sm" onchange="window.applyJunkRemovalFilters()">
            <label for="end-date-filter" class="text-sm font-medium text-gray-700">To:</label>
            <input type="date" id="end-date-filter" value="<?php echo htmlspecialchars($end_date_filter); ?>"
                   class="p-2 border border-gray-300 rounded-md text-sm" onchange="window.applyJunkRemovalFilters()">
        </div>

        <div class="flex-grow max-w-sm">
            <input type="text" id="search-input" placeholder="Search by ID, location, items..."
                   class="p-2 border border-gray-300 rounded-md w-full text-sm"
                   value="<?php echo htmlspecialchars($search_query); ?>"
                   onkeydown="if(event.key === 'Enter') window.applyJunkRemovalFilters()">
        </div>
        <button onclick="window.applyJunkRemovalFilters()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-md text-sm">
            Apply Filters
        </button>
    </div>

    <?php if (empty($junk_removal_requests)): ?>
        <p class="text-gray-600 text-center p-4">No junk removal requests found for the selected filters or search query.</p>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <input type="checkbox" id="select-all-junk-requests" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Request ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Date Submitted</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Location</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Items (Est.)</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($junk_removal_requests as $request): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="junk-request-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" value="<?php echo htmlspecialchars($request['quote_id']); ?>">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#Q<?php echo htmlspecialchars($request['quote_id']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo (new DateTime($request['created_at']))->format('Y-m-d H:i'); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($request['location']); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-sm truncate">
                                <?php
                                if (!empty($request['junk_items_json'])) {
                                    $item_types = array_column($request['junk_items_json'], 'itemType');
                                    echo htmlspecialchars(implode(', ', $item_types));
                                } else {
                                    echo 'N/A';
                                }
                                ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo getStatusBadgeClass($request['status']); ?>"><?php echo htmlspecialchars(strtoupper(str_replace('_', ' ', $request['status']))); ?></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 view-junk-request-details" data-quote-id="<?php echo htmlspecialchars($request['quote_id']); ?>">View Details</button>
                                <?php if ($request['status'] === 'quoted'): ?>
                                    <button class="ml-3 text-green-600 hover:text-green-900" onclick="window.loadCustomerSection('invoices', {quote_id: <?php echo $request['quote_id']; ?>});">Review Quote</button>
                                <?php elseif ($request['status'] === 'customer_draft'): ?>
                                     <button class="ml-3 text-orange-600 hover:text-orange-900 edit-junk-request-details" data-quote-id="<?php echo htmlspecialchars($request['quote_id']); ?>">Edit Draft</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <nav class="mt-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex-1 flex justify-between sm:hidden">
                <button onclick="window.loadCustomerJunkRemoval({page: <?php echo max(1, $current_page - 1); ?>, per_page: <?php echo $items_per_page; ?>, status: '<?php echo $filter_status; ?>', search: '<?php echo htmlspecialchars($search_query); ?>', start_date: '<?php echo htmlspecialchars($start_date_filter); ?>', end_date: '<?php echo htmlspecialchars($end_date_filter); ?>'})"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </button>
                <button onclick="window.loadCustomerJunkRemoval({page: <?php echo min($total_pages, $current_page + 1); ?>, per_page: <?php echo $items_per_page; ?>, status: '<?php echo $filter_status; ?>', search: '<?php echo htmlspecialchars($search_query); ?>', start_date: '<?php echo htmlspecialchars($start_date_filter); ?>', end_date: '<?php echo htmlspecialchars($end_date_filter); ?>'})"
                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </button>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between w-full">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing <span class="font-medium"><?php echo $offset + 1; ?></span> to
                        <span class="font-medium"><?php echo min($offset + $items_per_page, $total_requests_count); ?></span> of
                        <span class="font-medium"><?php echo $total_requests_count; ?></span> results
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium text-gray-700">Requests per page:</span>
                    <select onchange="window.loadCustomerJunkRemoval({page: 1, per_page: this.value, status: '<?php echo $filter_status; ?>', search: '<?php echo htmlspecialchars($search_query); ?>', start_date: '<?php echo htmlspecialchars($start_date_filter); ?>', end_date: '<?php echo htmlspecialchars($end_date_filter); ?>'})"
                            class="p-2 border border-gray-300 rounded-md text-sm">
                        <?php foreach ($items_per_page_options as $option): ?>
                            <option value="<?php echo $option; ?>" <?php echo $items_per_page == $option ? 'selected' : ''; ?>>
                                <?php echo $option; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <button onclick="window.loadCustomerJunkRemoval({page: <?php echo max(1, $current_page - 1); ?>, per_page: <?php echo $items_per_page; ?>, status: '<?php echo $filter_status; ?>', search: '<?php echo htmlspecialchars($search_query); ?>', start_date: '<?php echo htmlspecialchars($start_date_filter); ?>', end_date: '<?php echo htmlspecialchars($end_date_filter); ?>'})"
                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <button onclick="window.loadCustomerJunkRemoval({page: <?php echo $i; ?>, per_page: <?php echo $items_per_page; ?>, status: '<?php echo $filter_status; ?>', search: '<?php echo htmlspecialchars($search_query); ?>', start_date: '<?php echo htmlspecialchars($start_date_filter); ?>', end_date: '<?php echo htmlspecialchars($end_date_filter); ?>'})"
                                    class="<?php echo $i == $current_page ? 'z-10 bg-blue-50 border-blue-500 text-blue-600' : 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50'; ?> relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                <?php echo $i; ?>
                            </button>
                        <?php endfor; ?>
                        <button onclick="window.loadCustomerJunkRemoval({page: <?php echo min($total_pages, $current_page + 1); ?>, per_page: <?php echo $items_per_page; ?>, status: '<?php echo $filter_status; ?>', search: '<?php echo htmlspecialchars($search_query); ?>', start_date: '<?php echo htmlspecialchars($start_date_filter); ?>', end_date: '<?php echo htmlspecialchars($end_date_filter); ?>'})"
                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </nav>
                </div>
            </div>
            <div class="sm:flex items-center gap-2 ml-4 mt-4 sm:mt-0">
                <button id="bulk-delete-junk-requests-btn" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 shadow-md hidden">
                    <i class="fas fa-trash-alt mr-2"></i>Delete Selected
                </button>
            </div>
        </nav>
    <?php endif; ?>
</div>

<div id="junk-removal-detail-view" class="bg-white p-6 rounded-lg shadow-md border border-blue-200 mt-8 <?php echo $junk_detail_view_data ? '' : 'hidden'; ?>">
    <button class="mb-4 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300" onclick="window.hideJunkRemovalDetails()">
        <i class="fas fa-arrow-left mr-2"></i>Back to Requests
    </button>
    <?php if ($junk_detail_view_data): ?>
        <h2 class="text-2xl font-bold text-gray-800 mb-6" id="detail-junk-request-number">Junk Removal Request #Q<?php echo htmlspecialchars($junk_detail_view_data['quote_id']); ?> Details</h2>
        <div id="junk-request-details-content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 pb-6 border-b border-gray-200">
                <div><span class="font-medium">Request Date:</span> <?php echo (new DateTime($junk_detail_view_data['created_at']))->format('Y-m-d H:i'); ?></div>
                <div><span class="font-medium">Status:</span> <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo getStatusBadgeClass($junk_detail_view_data['status']); ?>"><?php echo htmlspecialchars(strtoupper(str_replace('_', ' ', $junk_detail_view_data['status']))); ?></span></div>
                <div><span class="font-medium">Location:</span> <?php echo htmlspecialchars($junk_detail_view_data['location']); ?></div>
                <div><span class="font-medium">Preferred Removal Date:</span> <?php echo htmlspecialchars($junk_detail_view_data['removal_date']); ?></div>
                <div><span class="font-medium">Preferred Removal Time:</span> <?php echo htmlspecialchars($junk_detail_view_data['removal_time'] ?? 'N/A'); ?></div>
                <div><span class="font-medium">Live Load Needed:</span> <?php echo $junk_detail_view_data['live_load_needed'] ? 'Yes' : 'No'; ?></div>
                <div><span class="font-medium">Urgent Request:</span> <?php echo $junk_detail_view_data['is_urgent'] ? 'Yes' : 'No'; ?></div>
                <div class="md:col-span-2"><span class="font-medium">Driver Instructions:</span> <?php echo htmlspecialchars($junk_detail_view_data['driver_instructions'] ?? 'None'); ?></div>
            </div>

            <div id="junk-items-view-mode">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Identified Junk Items</h3>
                <?php if (!empty($junk_detail_view_data['junk_items_json'])): ?>
                    <div class="overflow-x-auto mb-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Item Type</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase w-24">Qty</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Est. Dims</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Est. Wt.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($junk_detail_view_data['junk_items_json'] as $item): ?>
                                    <tr>
                                        <td class="p-2 text-sm text-gray-900"><?php echo htmlspecialchars($item['itemType'] ?? 'Unknown Item'); ?></td>
                                        <td class="p-2 text-sm text-gray-600"><?php echo htmlspecialchars($item['quantity'] ?? 'N/A'); ?></td>
                                        <td class="p-2 text-sm text-gray-600"><?php echo htmlspecialchars($item['estDimensions'] ?? 'N/A'); ?></td>
                                        <td class="p-2 text-sm text-gray-600"><?php echo htmlspecialchars($item['estWeight'] ?? 'N/A'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-gray-600 mb-6">No specific junk items detailed.</p>
                <?php endif; ?>
            </div>

            <div id="junk-items-edit-mode" class="hidden">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Edit Junk Items</h3>
                <table class="min-w-full divide-y divide-gray-200 mb-4" id="editable-junk-items-table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Item Type</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase w-24">Qty</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Est. Dims</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Est. Wt.</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase w-16"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Editable rows will be inserted here by JavaScript -->
                    </tbody>
                </table>
                <button type="button" id="add-junk-item-btn" class="mb-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-lg text-sm hover:bg-blue-200">
                    <i class="fas fa-plus-circle mr-2"></i>Add Item
                </button>
            </div>

            <div class="mb-6 pb-6 border-b border-gray-200">
                <p class="mb-2"><span class="font-medium">Recommended Dumpster Size:</span> <?php echo htmlspecialchars($junk_detail_view_data['recommended_dumpster_size'] ?? 'N/A'); ?></p>
                <p><span class="font-medium">Additional Comment:</span> <?php echo htmlspecialchars($junk_detail_view_data['additional_comment'] ?? 'None'); ?></p>
            </div>

            <h3 class="text-xl font-semibold text-gray-700 mb-4">Uploaded Media</h3>
            <?php if (!empty($junk_detail_view_data['media_urls_json'])): ?>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
                    <?php foreach ($junk_detail_view_data['media_urls_json'] as $media_url): ?>
                        <div class="relative group">
                            <?php
                            $fileExtension = pathinfo($media_url, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']);
                            ?>
                            <?php if ($isImage): ?>
                                <img src="<?php echo htmlspecialchars($media_url); ?>" alt="Junk item photo" class="w-full h-32 object-cover rounded-lg shadow-md cursor-pointer view-media-btn">
                            <?php else: ?>
                                <video controls src="<?php echo htmlspecialchars($media_url); ?>" class="w-full h-32 object-cover rounded-lg shadow-md"></video>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg">
                                <a href="<?php echo htmlspecialchars($media_url); ?>" target="_blank" class="text-white text-3xl hover:text-blue-300" title="Open Media">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-600 mb-6">No media uploaded for this request.</p>
            <?php endif; ?>

            <div class="flex justify-end mt-6 space-x-3">
                <?php if ($junk_detail_view_data['status'] === 'customer_draft'): ?>
                    <button id="edit-junk-items-btn" class="py-2 px-5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-lg">
                        <i class="fas fa-edit mr-2"></i>Edit Items
                    </button>
                    <button id="save-junk-items-btn" class="py-2 px-5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-lg hidden">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                    <button id="cancel-edit-junk-items-btn" class="py-2 px-5 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition-colors duration-200 shadow-lg hidden">
                        Cancel
                    </button>
                    <button id="submit-junk-request-btn" class="py-2 px-5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Submit Request
                    </button>
                <?php elseif ($junk_detail_view_data['status'] === 'quoted'): ?>
                    <div class="text-right mt-6">
                        <p class="text-xl font-bold text-gray-800 mb-3">Quoted Price: <span class="text-green-600">$<?php echo number_format($junk_detail_view_data['quoted_price'], 2); ?></span></p>
                        <button class="py-2 px-5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-lg" onclick="window.loadCustomerSection('invoices', {quote_id: <?php echo $junk_detail_view_data['quote_id']; ?>});">
                            <i class="fas fa-hand-holding-usd mr-2"></i>Review & Pay Quote
                        </button>
                    </div>
                <?php elseif ($junk_detail_view_data['status'] === 'converted_to_booking'): ?>
                    <div class="text-center mt-6">
                        <p class="text-xl font-bold text-green-600 mb-3"><i class="fas fa-check-circle mr-2"></i>This request has been successfully converted to a booking!</p>
                        <button class="py-2 px-5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-lg" onclick="window.loadCustomerSection('bookings', {});">
                            <i class="fas fa-book-open mr-2"></i>View Bookings
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-600">Junk removal request details not found or invalid ID.</p>
    <?php endif; ?>
</div>

<div id="image-modal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
    <button class="absolute top-4 right-4 text-white text-4xl" onclick="window.hideModal('image-modal')">&times;</button>
    <img id="image-modal-content" src="" class="max-w-full max-h-[90%] object-contain">
</div>

<script>
    // Encapsulate JavaScript in an IIFE to prevent global variable conflicts
    (function() {
        // Expose functions to the global window object for direct HTML calls
        window.loadCustomerJunkRemoval = function(params = {}) {
            const currentParams = new URLSearchParams(window.location.search);
            const newParams = {
                page: currentParams.get('page') || 1,
                per_page: currentParams.get('per_page') || 25, // Default as in PHP
                status: currentParams.get('status') || 'all',
                search: currentParams.get('search') || '',
                start_date: currentParams.get('start_date') || '',
                end_date: currentParams.get('end_date') || '',
                ...params
            };
            window.loadCustomerSection('junk-removal', newParams);
        };

        window.applyJunkRemovalFilters = function() {
            const statusFilter = document.getElementById('status-filter').value;
            const searchInput = document.getElementById('search-input').value;
            const startDateFilter = document.getElementById('start-date-filter').value;
            const endDateFilter = document.getElementById('end-date-filter').value;
            window.loadCustomerJunkRemoval({ page: 1, status: statusFilter, search: searchInput, start_date: startDateFilter, end_date: endDateFilter });
        };

        window.showJunkRemovalDetails = function(quoteId) {
            window.loadCustomerSection('junk-removal', { quote_id: quoteId });
        };

        window.hideJunkRemovalDetails = function() {
            window.loadCustomerSection('junk-removal');
        };

        window.showImageModal = function(imageUrl) {
            document.getElementById('image-modal-content').src = imageUrl;
            window.showModal('image-modal');
        };

        // --- Bulk Delete Functionality Helper ---
        function toggleBulkDeleteButtonVisibility() {
            const junkRemovalListSection = document.getElementById('junk-removal-list');
            const bulkDeleteJunkRequestsBtn = document.getElementById('bulk-delete-junk-requests-btn'); 
            
            // Only proceed if the list section is visible and the button exists
            if (junkRemovalListSection && !junkRemovalListSection.classList.contains('hidden') && bulkDeleteJunkRequestsBtn) {
                const anyChecked = document.querySelectorAll('.junk-request-checkbox:checked').length > 0;
                bulkDeleteJunkRequestsBtn.classList.toggle('hidden', !anyChecked);
            } else if (bulkDeleteJunkRequestsBtn) {
                // If list section is hidden, ensure the button is hidden too
                bulkDeleteJunkRequestsBtn.classList.add('hidden');
            }
        }

        // --- CORRECTED SECTION ---
        // We define this variable at a higher scope so it can be accessed by multiple functions.
        let originalJunkItems = []; // To store the original state for 'Cancel'

        // --- Event Delegation for all buttons and interactive elements ---
        document.body.addEventListener('click', function(event) {
            // Handle "View Details" button click in the junk removal list
            if (event.target.closest('.view-junk-request-details')) {
                const button = event.target.closest('.view-junk-request-details');
                window.showJunkRemovalDetails(button.dataset.quoteId);
            }
            
            // Handle "Edit Draft" button click in the junk removal list
            else if (event.target.closest('.edit-junk-request-details')) {
                const button = event.target.closest('.edit-junk-request-details');
                window.showJunkRemovalDetails(button.dataset.quoteId);
                // After loading details, trigger edit mode with a slight delay
                setTimeout(() => {
                    document.getElementById('edit-junk-items-btn')?.click();
                }, 100); 
            }
            // Handle image/video click to show in modal
            else if (event.target.closest('.view-media-btn') && event.target.tagName === 'IMG') {
                window.showImageModal(event.target.src);
            }
            // Handle "Select All" checkbox for bulk delete
            else if (event.target.id === 'select-all-junk-requests') {
                document.querySelectorAll('.junk-request-checkbox').forEach(checkbox => {
                    checkbox.checked = event.target.checked;
                });
                toggleBulkDeleteButtonVisibility();
            }
            // Handle "Delete Selected" button for bulk delete
            else if (event.target.id === 'bulk-delete-junk-requests-btn') {
                const selectedIds = Array.from(document.querySelectorAll('.junk-request-checkbox:checked')).map(cb => cb.value);
                if (selectedIds.length === 0) {
                    window.showToast('Please select at least one request to delete.', 'warning');
                    return;
                }

                window.showConfirmationModal(
                    'Delete Selected Requests',
                    `Are you sure you want to delete ${selectedIds.length} selected junk removal request(s)? This action cannot be undone.`,
                    async (confirmed) => {
                        if (confirmed) {
                            window.showToast('Deleting requests...', 'info');
                            const formData = new FormData();
                            formData.append('action', 'delete_bulk'); // Action handled by api/customer/quotes.php
                            formData.append('csrf_token', '<?php echo htmlspecialchars($csrf_token); ?>');
                            selectedIds.forEach(id => formData.append('quote_ids[]', id)); // Send as quote_ids

                            try {
                                const response = await fetch('/api/customer/quotes.php', { // Target the quotes API
                                    method: 'POST',
                                    body: formData
                                });
                                const result = await response.json();
                                if (result.success) {
                                    window.showToast(result.message, 'success');
                                    window.loadCustomerJunkRemoval(); // Reload list after deletion
                                } else {
                                    window.showToast('Error: ' + result.message, 'error');
                                }
                            } catch (error) {
                                window.showToast('An unexpected error occurred during bulk delete.', 'error');
                                console.error('Bulk delete junk removal requests API Error:', error);
                            }
                        }
                    },
                    'Delete Selected',
                    'bg-red-600'
                );
            }
            // ** FIX APPLIED HERE **
            // Handle "Edit Items" button (detail view)
            else if (event.target.id === 'edit-junk-items-btn') {
                // ** FIX **: Get elements *inside* the event handler, when they are guaranteed to exist.
                const junkItemsViewMode = document.getElementById('junk-items-view-mode');
                const junkItemsEditMode = document.getElementById('junk-items-edit-mode');
                const editJunkItemsBtn = document.getElementById('edit-junk-items-btn');
                const saveJunkItemsBtn = document.getElementById('save-junk-items-btn');
                const cancelEditJunkItemsBtn = document.getElementById('cancel-edit-junk-items-btn');
                const submitJunkRequestBtn = document.getElementById('submit-junk-request-btn');

                // Now it's safe to access classList
                junkItemsViewMode.classList.add('hidden');
                junkItemsEditMode.classList.remove('hidden');
                editJunkItemsBtn.classList.add('hidden');
                saveJunkItemsBtn.classList.remove('hidden');
                cancelEditJunkItemsBtn.classList.remove('hidden');
                if(submitJunkRequestBtn) submitJunkRequestBtn.classList.add('hidden'); // Hide submit if editing
                
                // Populate editable table with current data
                const currentItems = <?php echo json_encode($junk_detail_view_data['junk_items_json'] ?? []); ?>;
                originalJunkItems = JSON.parse(JSON.stringify(currentItems)); // Deep copy for cancellation
                renderEditableJunkItems(currentItems);
            }
            // Handle "Cancel Edit" button (detail view)
            else if (event.target.id === 'cancel-edit-junk-items-btn') {
                const currentQuoteId = <?php echo htmlspecialchars($junk_detail_view_data['quote_id'] ?? 'null'); ?>;
                if (currentQuoteId) {
                    // Just reload the detail view to reset everything
                    window.loadCustomerSection('junk-removal', { quote_id: currentQuoteId });
                } else {
                    window.loadCustomerSection('junk-removal');
                }
            }
            // Handle "Add Item" button (edit mode)
            else if (event.target.id === 'add-junk-item-btn') {
                addJunkItemRow(); // Add an empty row
            }
            // Handle "Save Changes" button (edit mode)
            else if (event.target.id === 'save-junk-items-btn') {
                const editedItems = collectEditedJunkItems();
                const quoteId = <?php echo htmlspecialchars($junk_detail_view_data['quote_id'] ?? 'null'); ?>;

                if (editedItems.some(item => !item.itemType.trim())) {
                    window.showToast('Item Type cannot be empty for any item.', 'error');
                    return;
                }
                if (editedItems.length === 0) {
                     window.showToast('At least one junk item is required.', 'error');
                     return;
                }

                window.showConfirmationModal(
                    'Save Changes',
                    'Are you sure you want to save these changes to your junk removal request?',
                    async (confirmed) => {
                        if (confirmed) {
                            window.showToast('Saving items...', 'info');
                            const formData = new FormData();
                            formData.append('action', 'update_junk_items'); // New action for backend
                            formData.append('quote_id', quoteId);
                            formData.append('junk_items', JSON.stringify(editedItems)); // Send as JSON string
                            formData.append('csrf_token', '<?php echo htmlspecialchars($csrf_token); ?>'); // Add CSRF token

                            try {
                                const response = await fetch('/api/customer/junk_removal_update.php', { // New API endpoint
                                    method: 'POST',
                                    body: formData
                                });
                                const result = await response.json();

                                if (result.success) {
                                    window.showToast(result.message, 'success');
                                    // Reload details view to show updated items in view mode
                                    window.loadCustomerSection('junk-removal', { quote_id: quoteId });
                                } else {
                                    window.showToast(result.message, 'error');
                                }
                            } catch (error) {
                                console.error('Save junk items API Error:', error);
                                window.showToast('An error occurred while saving. Please try again.', 'error');
                            }
                        }
                    },
                    'Save',
                    'bg-green-600'
                );
            }
            // Handle "Submit Request" button (detail view)
            else if (event.target.id === 'submit-junk-request-btn') {
                const quoteId = <?php echo htmlspecialchars($junk_detail_view_data['quote_id'] ?? 'null'); ?>;
                const currentStatus = "<?php echo htmlspecialchars($junk_detail_view_data['status'] ?? ''); ?>";

                if (currentStatus !== 'customer_draft') {
                    window.showToast('This request is not in a draft state and cannot be re-submitted.', 'error');
                    return;
                }
                
                window.showConfirmationModal(
                    'Submit Request for Quote',
                    'Are you sure you want to submit this request for a quote from our team?',
                    async (confirmed) => {
                        if (confirmed) {
                            window.showToast('Submitting request...', 'info');
                            const formData = new FormData();
                            formData.append('action', 'submit_customer_draft'); // New action for backend
                            formData.append('quote_id', quoteId);
                            formData.append('csrf_token', '<?php echo htmlspecialchars($csrf_token); ?>'); // Add CSRF token

                            try {
                                const response = await fetch('/api/customer/junk_removal_update.php', { // New API endpoint
                                    method: 'POST',
                                    body: formData
                                });
                                const result = await response.json();

                                if (result.success) {
                                    window.showToast(result.message, 'success');
                                    window.loadCustomerSection('junk-removal', { quote_id: quoteId }); // Reload
                                } else {
                                    window.showToast(result.message, 'error');
                                }
                            } catch (error) {
                                console.error('Submit draft API Error:', error);
                                window.showToast('An error occurred during submission. Please try again.', 'error');
                            }
                        }
                    },
                    'Submit',
                    'bg-blue-600'
                );
            }
        });

        // Event delegation for general checkbox changes (for bulk delete button visibility)
        document.body.addEventListener('change', function(event) {
            if (event.target.classList.contains('junk-request-checkbox')) {
                const selectAllJunkRequestsCheckbox = document.getElementById('select-all-junk-requests');
                if (selectAllJunkRequestsCheckbox && !event.target.checked) {
                    selectAllJunkRequestsCheckbox.checked = false;
                }
                toggleBulkDeleteButtonVisibility();
            }
        });

        // --- Helper functions for GUI-based Editing ---
        function renderEditableJunkItems(items) {
            const editableJunkItemsTableBody = document.getElementById('editable-junk-items-table')?.querySelector('tbody');
            if (!editableJunkItemsTableBody) return;
            editableJunkItemsTableBody.innerHTML = ''; // Clear existing rows
            items.forEach(item => {
                addJunkItemRow(item);
            });
        }

        function addJunkItemRow(item = {}) {
            const editableJunkItemsTableBody = document.getElementById('editable-junk-items-table')?.querySelector('tbody');
            if (!editableJunkItemsTableBody) return;
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td class="p-2"><input type="text" class="w-full p-2 border rounded" value="${item.itemType ?? ''}" placeholder="e.g., Sofa" required></td>
                <td class="p-2"><input type="number" class="w-full p-2 border rounded" value="${item.quantity ?? 1}" min="1" required></td>
                <td class="p-2"><input type="text" class="w-full p-2 border rounded" value="${item.estDimensions ?? ''}" placeholder="e.g., 6x3x3 ft"></td>
                <td class="p-2"><input type="text" class="w-full p-2 border rounded" value="${item.estWeight ?? ''}" placeholder="e.g., 100 lbs"></td>
                <td class="p-2 text-center"><button type="button" class="text-red-500 hover:text-red-700 remove-junk-item-btn">&times;</button></td>
            `;
            editableJunkItemsTableBody.appendChild(newRow);
            // Attach listener for new remove button
            newRow.querySelector('.remove-junk-item-btn')?.addEventListener('click', (e) => e.target.closest('tr').remove());
        }

        function collectEditedJunkItems() {
            const items = [];
            const editableJunkItemsTableBody = document.getElementById('editable-junk-items-table')?.querySelector('tbody');
            if (!editableJunkItemsTableBody) return items;
            editableJunkItemsTableBody.querySelectorAll('tr').forEach(row => {
                const inputs = row.querySelectorAll('input');
                items.push({
                    itemType: inputs[0].value.trim(),
                    quantity: parseInt(inputs[1].value) || 1,
                    estDimensions: inputs[2].value.trim(),
                    estWeight: inputs[3].value.trim()
                });
            });
            return items;
        }
    })(); // End of IIFE
</script>