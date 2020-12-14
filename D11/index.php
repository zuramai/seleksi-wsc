<?php
$posts = json_decode(file_get_contents('data.json'));
// var_dump($posts);
$limit = 5;
$from = 0;

if(isset($_GET["page"])) {
    $from = ($_GET['page']-1) * 5;
}

$totalData = count($posts);

$paginate = array_slice($posts, $from, $limit);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$nextPage = isset($_GET['page']) ? $_GET['page'] + 1 : 1; 
$prevPage = isset($_GET['page']) && $_GET["page"] > 1 ? $_GET['page'] - 1 : 1; 
$lastPage = ceil($totalData / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <style>
    td,th {
        border: 1px solid #ccc;
        padding: .5rem;
    }
    </style>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($paginate as $post): ?>
                <tr>
                    <td><?= $post->id ?></td>
                    <td><?= $post->name ?></td>
                    <td><?= $post->gender ?></td>
                    <td><?= $post->age ?></td>
                    <td><?= $post->company ?></td>
                    <td><?= $post->email ?></td>
                    <td><?= $post->phone ?></td>
                    <td><?= $post->address ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        
        <ul class="pagination">
            <?php if($currentPage-1 > 0): ?>
            <li class="page-item">
                <a  class='page-link' href="?page=<?= $prevPage ?>">Prev</a>
            </li>
            <?php endif ?>
            <?php if($currentPage-2 > 0): ?>
                <li class="page-item">
                    <a class='page-link' href="?page=<?= $currentPage-2 ?>"><?= $currentPage-2 ?></a>
                </li>
            <?php endif ?>

            <?php if($currentPage-1 > 0): ?>
                <li class="page-item">
                    <a class='page-link' href="?page=<?= $currentPage-1 ?>"><?= $currentPage-1 ?></a>
                </li>
            <?php endif ?>

            <a class='page-link active' aria-current="page" href="?page=<?= $currentPage ?>"><?= $currentPage ?></a>


            
            <?php if($currentPage+1 <= $lastPage): ?>
                <li class="page-item">
                    <a class='page-link' href="?page=<?= $currentPage + 1 ?>"><?= $currentPage+1 ?></a>
                </li>
            <?php endif ?>
            <?php if($currentPage+2 <= $lastPage): ?>
                <li class="page-item">
                    <a class='page-link' href="?page=<?= $currentPage + 2 ?>"><?= $currentPage+2 ?></a>
                </li>
            <?php endif ?>
            <?php if($currentPage+1 <= $lastPage): ?>
                <li class="page-item">
                    <a class='page-link' href="?page=<?= $nextPage ?>">Next</a>
                </li>
            <?php endif ?>
        </ul>


    </div>
</body>
</html>