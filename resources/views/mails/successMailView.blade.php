<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Success Mail</title>
<style>
    
.card-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.card-body {
    padding: 20px;
}

.custom-list {
    list-style: none;
    padding: 0;
}

.custom-list-item {
    margin-bottom: 10px;
}

.item-label {
    font-weight: bold;
}

.item-value.success {
    color: #fff;
    background-color: #28a745;
    padding: 5px 10px;
    border-radius: 3px;
}

    </style>
</head>
<body>
    <h1 class="h3">Hello {{$enrolledSuccess->user->name}}</h1>
    <p>Enrollment for {{$enrolledSuccess->course->title}} is completely successfull.Your course will start {{$enrolledSuccess->course->starting_date}}.</p>

    <div class="card-container">
        <div class="card-body">
            <ul class="custom-list">
                <li class="custom-list-item">
                    <span class="item-label">Course Title</span>
                    <span class="item-value">{{ $enrolledSuccess->course->title }}</span>
                </li>
                <li class="custom-list-item">
                    <span class="item-label">Enrolled Date</span>
                    <span class="item-value">{{ $enrolledSuccess->updated_at }}</span>
                </li>
                <li class="custom-list-item">
                    <span class="item-label">Enrolled Fee</span>
                    <span class="item-value">{{ $enrolledSuccess->course->fee }}</span>
                </li>
                <li class="custom-list-item">
                    <span class="item-label">Your Seat</span>
                    <span class="item-value">{{ $enrolledSuccess->seat_number }}</span>
                </li>
                <li class="custom-list-item">
                    <span class="item-label">Enrolled Status</span>
                    <span class="item-value success">Success</span>
                </li>
            </ul>
        </div>
    </div>
    
    
</body>
</html>