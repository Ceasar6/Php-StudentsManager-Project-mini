<?php
include_once 'src/Student.php';
include_once 'src/StudentManager.php';
$studentManager = new \projectMini\src\StudentManager\StudentManager('data.json');
$students = $studentManager->getStudents();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    th, td {
        text-align: center;
    }
</style>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Users</h1>
            <div class="row">
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-outline-primary"><a href="views/add.php">Create</a></button>
                </div>
                <div class="col-12 col-md-8 ">
                    <form class="form-inline " method="get" action="src/students/search.php">
                        <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search"
                               aria-label="Search" name="keyword">
                        <button class="  btn btn-outline-success my-1" type="submit">Search</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-12">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($students as $key => $student): ?>
                    <tr>
                        <th scope="row"><?php echo $key + 1 ?></th>
                        <td><?php echo $student->fullName ?></td>
                        <td><?php echo $student->email ?></td>
                        <td><?php echo $student->address ?></td>
                        <td><a href="views/delete.php?index=<?php echo $key ?>"
                               onclick="return confirm('Ban chac chan muon xoa khong')"
                               class="btn btn-danger">Delete</a></td>
                        <td><a href="views/edit.php?index=<?php echo $key ?>" class="btn btn-primary">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

</body>
</html>
