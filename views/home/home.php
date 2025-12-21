<?php
// Sample data for cards - in a real application, this would come from a database
$cards = [
    [
        'id' => 1,
        'title' => 'Project Alpha',
        'description' => 'Dashboard redesign for client portal',
        'status' => 'In Progress',
        'priority' => 'High',
        'dueDate' => '2025-05-15',
        'assignee' => 'John Doe',
        'avatar' => 'https://i.pravatar.cc/150?img=1'
    ],
    [
        'id' => 2,
        'title' => 'Feature Implementation',
        'description' => 'Add payment gateway integration',
        'status' => 'To Do',
        'priority' => 'Medium',
        'dueDate' => '2025-05-20',
        'assignee' => 'Jane Smith',
        'avatar' => 'https://i.pravatar.cc/150?img=5'
    ],
    [
        'id' => 3,
        'title' => 'Bug Fix',
        'description' => 'Resolve login authentication issue',
        'status' => 'Completed',
        'priority' => 'Critical',
        'dueDate' => '2025-05-10',
        'assignee' => 'Robert Johnson',
        'avatar' => 'https://i.pravatar.cc/150?img=8'
    ],
    [
        'id' => 4,
        'title' => 'Documentation',
        'description' => 'Update API documentation for v2.0',
        'status' => 'In Progress',
        'priority' => 'Low',
        'dueDate' => '2025-05-25',
        'assignee' => 'Emily Chen',
        'avatar' => 'https://i.pravatar.cc/150?img=9'
    ],
    [
        'id' => 5,
        'title' => 'UI Enhancement',
        'description' => 'Improve mobile responsiveness',
        'status' => 'To Do',
        'priority' => 'Medium',
        'dueDate' => '2025-05-30',
        'assignee' => 'Michael Brown',
        'avatar' => 'https://i.pravatar.cc/150?img=11'
    ]
];

// Function to get status color
function getStatusColor($status) {
    switch ($status) {
        case 'Completed':
            return '#4CAF50'; // Green
        case 'In Progress':
            return '#2196F3'; // Blue
        case 'To Do':
            return '#FFC107'; // Yellow
        default:
            return '#9E9E9E'; // Grey
    }
}

// Function to get priority color
function getPriorityColor($priority) {
    switch ($priority) {
        case 'Critical':
            return '#F44336'; // Red
        case 'High':
            return '#FF5722'; // Deep Orange
        case 'Medium':
            return '#FF9800'; // Orange
        case 'Low':
            return '#8BC34A'; // Light Green
        default:
            return '#9E9E9E'; // Grey
    }
}

// Handle card action (in a real application)
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = (int)$_GET['id'];
    
    // In a real application, you would perform database operations here
    // For demo purposes, we'll just show a message
    $actionMessage = "";
    
    if ($action === 'view') {
        $actionMessage = "Viewing card #$id";
    } else if ($action === 'edit') {
        $actionMessage = "Editing card #$id";
    } else if ($action === 'delete') {
        $actionMessage = "Deleting card #$id";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Cards</title>
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        h1 {
            color: #333;
            font-weight: 600;
        }
        
        .header-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 8px 16px;
            background-color: #4361ee;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }
        
        .btn:hover {
            background-color: #3a56d4;
        }
        
        .btn-outline {
            background-color: transparent;
            color: #4361ee;
            border: 1px solid #4361ee;
        }
        
        .btn-outline:hover {
            background-color: #f0f4ff;
        }
        
        /* Filter Section */
        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        
        .filter-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        select, input {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #555;
        }
        
        /* Card Grid */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        
        /* Card Styles */
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }
        
        .card-menu {
            cursor: pointer;
            font-size: 18px;
            color: #666;
        }
        
        .card-body {
            padding: 15px;
        }
        
        .card-description {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .card-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }
        
        .meta-label {
            color: #888;
            width: 70px;
        }
        
        .status-badge, .priority-badge {
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 500;
            color: white;
        }
        
        .card-footer {
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f0f0f0;
            background-color: #fafafa;
        }
        
        .assignee {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .assignee-name {
            font-size: 13px;
            color: #555;
        }
        
        .card-actions {
            display: flex;
            gap: 5px;
        }
        
        .action-btn {
            border: none;
            background: none;
            cursor: pointer;
            color: #666;
            font-size: 16px;
            padding: 5px;
            transition: color 0.2s;
        }
        
        .action-btn:hover {
            color: #4361ee;
        }
        
        /* Action message */
        .action-message {
            background-color: #e8f4ff;
            color: #0066cc;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid #0066cc;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .filters {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Task Board</h1>
            <div class="header-actions">
                <button class="btn btn-outline">Filter</button>
                <button class="btn">+ New Task</button>
            </div>
        </header>
        
        <?php if (isset($actionMessage)): ?>
        <div class="action-message">
            <?php echo $actionMessage; ?>
        </div>
        <?php endif; ?>
        
        <div class="filters">
            <div class="filter-item">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="">All</option>
                    <option value="to-do">To Do</option>
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            
            <div class="filter-item">
                <label for="priority">Priority:</label>
                <select id="priority" name="priority">
                    <option value="">All</option>
                    <option value="critical">Critical</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            
            <div class="filter-item">
                <label for="search">Search:</label>
                <input type="text" id="search" name="search" placeholder="Search tasks...">
            </div>
        </div>
        
        <div class="card-grid">
            <?php foreach ($cards as $card): ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo htmlspecialchars($card['title']); ?></h3>
                    <div class="card-menu">⋮</div>
                </div>
                
                <div class="card-body">
                    <p class="card-description"><?php echo htmlspecialchars($card['description']); ?></p>
                    
                    <div class="card-meta">
                        <div class="meta-item">
                            <span class="meta-label">Status:</span>
                            <span class="status-badge" style="background-color: <?php echo getStatusColor($card['status']); ?>">
                                <?php echo htmlspecialchars($card['status']); ?>
                            </span>
                        </div>
                        
                        <div class="meta-item">
                            <span class="meta-label">Priority:</span>
                            <span class="priority-badge" style="background-color: <?php echo getPriorityColor($card['priority']); ?>">
                                <?php echo htmlspecialchars($card['priority']); ?>
                            </span>
                        </div>
                        
                        <div class="meta-item">
                            <span class="meta-label">Due Date:</span>
                            <span><?php echo htmlspecialchars($card['dueDate']); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="assignee">
                        <img src="<?php echo htmlspecialchars($card['avatar']); ?>" alt="Avatar" class="avatar">
                        <span class="assignee-name"><?php echo htmlspecialchars($card['assignee']); ?></span>
                </div>
                    
                    <div class="card-actions">
                        <a href="?action=view&id=<?php echo $card['id']; ?>" class="action-btn" title="View">👁️</a>
                        <a href="?action=edit&id=<?php echo $card['id']; ?>" class="action-btn" title="Edit">✏️</a>
                        <a href="?action=delete&id=<?php echo $card['id']; ?>" class="action-btn" title="Delete" onclick="return confirm('Are you sure you want to delete this task?')">🗑️</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>