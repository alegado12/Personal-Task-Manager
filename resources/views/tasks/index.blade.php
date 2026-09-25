<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #fffdf2;
            color: #334155;
        }

        /* NAVIGATION */
        nav {
            background: #87ceeb;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .logo span {
            color: #fff4a3;
        }

        .nav-link {
            text-decoration: none;
            background: #fff4a3;
            color: #334155;
            padding: 10px 18px;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s;
        }

        .nav-link:hover {
            background: white;
            transform: translateY(-2px);
        }

        /* MAIN */
        .container {
            width: 86%;
            max-width: 1200px;
            margin: 35px auto;
        }

        /* WELCOME CARD */
        .welcome {
            background: linear-gradient(135deg, #fff4a3, #fff9cf);
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(135, 206, 235, 0.18);
        }

        .welcome h1 {
            color: #25627a;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #64748b;
        }

        /* STATISTICS */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
            border-top: 6px solid #87ceeb;
        }

        .stat-card:nth-child(2) {
            border-top-color: #ffd84d;
        }

        .stat-card:nth-child(3) {
            border-top-color: #5bb9df;
        }

        .stat-icon {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .stat-card h2 {
            font-size: 30px;
            color: #25627a;
        }

        .stat-card p {
            color: #64748b;
            margin-top: 5px;
        }

        /* TASK CARD */
        .task-card {
            background: white;
            border-radius: 25px;
            padding: 28px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
            overflow-x: auto;
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .task-header h2 {
            color: #25627a;
        }

        .add-button {
            text-decoration: none;
            background: #5bb9df;
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s;
        }

        .add-button:hover {
            background: #349bc5;
            transform: translateY(-2px);
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #87ceeb;
            color: white;
            padding: 15px;
            text-align: left;
        }

        th:first-child {
            border-radius: 12px 0 0 12px;
        }

        th:last-child {
            border-radius: 0 12px 12px 0;
        }

        td {
            padding: 16px 15px;
            border-bottom: 1px solid #eef2f7;
        }

        tr:hover {
            background: #fffdf0;
        }

        .task-name {
            font-weight: bold;
            color: #25627a;
        }

        .description {
            color: #64748b;
            max-width: 280px;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .pending {
            background: #fff4a3;
            color: #856404;
        }

        .completed {
            background: #d9f4ff;
            color: #28708d;
        }

        /* BUTTONS */
        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .edit-button,
        .status-button,
        .delete-button {
            border: none;
            text-decoration: none;
            padding: 8px 13px;
            border-radius: 18px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .edit-button {
            background: #fff4a3;
            color: #665500;
        }

        .status-button {
            background: #d9f4ff;
            color: #28708d;
        }

        .delete-button {
            background: #ffe2df;
            color: #a23b32;
        }

        .edit-button:hover,
        .status-button:hover,
        .delete-button:hover {
            transform: translateY(-2px);
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #94a3b8;
        }

        /* MOBILE */
        @media (max-width: 700px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .container {
                width: 92%;
            }

            nav {
                padding: 15px 4%;
            }

            .welcome {
                padding: 22px;
            }

            .task-card {
                padding: 18px;
            }

            .task-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="logo">☁️ My <span>Task Manager</span></div>

    <a href="/tasks/create" class="nav-link">
        🌼 Add Task
    </a>
</nav>

<div class="container">

    <div class="welcome">
        <h1>🌼 Welcome to Your Task Manager!</h1>
        <p>Keep your tasks organized, simple, and stress-free. ☁️</p>
    </div>

    @if(session('success'))
        <div style="
            background:#d9f4ff;
            color:#28708d;
            padding:15px 20px;
            border-radius:15px;
            margin-bottom:20px;
            font-weight:bold;
        ">
            ✨ {{ session('success') }}
        </div>
    @endif

    @php
        $total = $tasks->count();
        $pending = $tasks->where('status', 'Pending')->count();
        $completed = $tasks->where('status', 'Completed')->count();
    @endphp

    <div class="stats">

        <div class="stat-card">
            <div class="stat-icon">📋</div>
            <h2>{{ $total }}</h2>
            <p>Total Tasks</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon">🌼</div>
            <h2>{{ $pending }}</h2>
            <p>Pending Tasks</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon">✨</div>
            <h2>{{ $completed }}</h2>
            <p>Completed Tasks</p>
        </div>

    </div>

    <div class="task-card">

        <div class="task-header">
            <h2>📋 My Tasks</h2>

            <a href="/tasks/create" class="add-button">
                + Add New Task
            </a>
        </div>

        @if($tasks->count() > 0)

            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($tasks as $task)

                    <tr>

                        <td class="task-name">
                            {{ $task->task_name }}
                        </td>

                        <td class="description">
                            {{ $task->description ?: 'No description' }}
                        </td>

                        <td>
                            @if($task->status === 'Pending')
                                <span class="status pending">
                                    🌼 Pending
                                </span>
                            @else
                                <span class="status completed">
                                    ✨ Completed
                                </span>
                            @endif
                        </td>

                        <td>
                            {{ $task->due_date ?: 'No due date' }}
                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="/tasks/{{ $task->id }}/edit"
                                    class="edit-button">
                                    Edit
                                </a>

                                <form
                                    action="/tasks/{{ $task->id }}/status"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="status-button">

                                        {{ $task->status === 'Pending'
                                            ? 'Complete'
                                            : 'Set Pending' }}

                                    </button>
                                </form>

                                <form
                                    action="/tasks/{{ $task->id }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this task?')">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>
            </table>

        @else

            <div class="empty">
                <div style="font-size:45px;">☁️</div>
                <h3>No tasks yet!</h3>
                <p>Add your first task and start organizing your day. 🌼</p>
            </div>

        @endif

    </div>

</div>

</body>
</html>