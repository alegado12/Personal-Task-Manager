<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add New Task</title>

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

        nav {
            background: #87ceeb;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .logo span {
            color: #fff4a3;
        }

        .back {
            text-decoration: none;
            background: #fff4a3;
            color: #334155;
            padding: 10px 18px;
            border-radius: 25px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 45px auto;
        }

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 28px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .title .icon {
            font-size: 45px;
        }

        .title h1 {
            color: #25627a;
            margin: 10px 0;
        }

        .title p {
            color: #64748b;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #25627a;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 15px;
            border: 2px solid #d9f4ff;
            border-radius: 14px;
            outline: none;
            font-size: 15px;
            background: #fcfeff;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #87ceeb;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .save-button,
        .cancel-button {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .save-button {
            background: #5bb9df;
            color: white;
        }

        .save-button:hover {
            background: #349bc5;
        }

        .cancel-button {
            background: #fff4a3;
            color: #665500;
        }

        .error {
            background: #ffe2df;
            color: #a23b32;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        @media(max-width:600px) {
            .form-card {
                padding: 25px 20px;
            }

            .buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="logo">
        ☁️ My <span>Task Manager</span>
    </div>

    <a href="/" class="back">
        ← Back
    </a>
</nav>

<div class="container">

    <div class="form-card">

        <div class="title">
            <div class="icon">🌼</div>
            <h1>Add New Task</h1>
            <p>Create a new task and keep your day organized.</p>
        </div>

        @if($errors->any())
            <div class="error">
                <strong>Please fix the following:</strong>

                <ul style="margin-top:8px; margin-left:20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/tasks" method="POST">

            @csrf

            <div class="form-group">
                <label>🌼 Task Name</label>

                <input
                    type="text"
                    name="task_name"
                    placeholder="Enter your task..."
                    value="{{ old('task_name') }}"
                    required>
            </div>

            <div class="form-group">
                <label>☁️ Description</label>

                <textarea
                    name="description"
                    placeholder="Write something about your task...">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>✨ Status</label>

                <select name="status" required>

                    <option value="Pending"
                        {{ old('status') == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ old('status') == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label>📅 Due Date</label>

                <input
                    type="date"
                    name="due_date"
                    value="{{ old('due_date') }}">
            </div>

            <div class="buttons">

                <a href="/" class="cancel-button">
                    Cancel
                </a>

                <button type="submit" class="save-button">
                    ✨ Add Task
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>