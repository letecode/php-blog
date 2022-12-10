<?php 

    include_once 'api/database.php';

    $db = new Database();
    $posts = $db->getPosts();

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    
    <body>
        <!-- Navigation-->
        <?php include('includes/navigation.php'); ?>

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Letecode Blog</h1>
                            <span class="subheading">A Blog to learn PHP CRUD</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php
                        foreach ($posts as $post) {

                            $user = $db->getUser($post['id_users']);
                            ?>

                            <!-- Post preview-->
                            <div class="post-preview">
                                <a href="post.php?article_id=<?php echo $post['id']; ?>">
                                    <img src="<?php echo $post['cover']; ?>" alt="" class="img-fluid rounded">
                                    <h2 class="post-title"><?php echo $post['title']; ?></h2>
                                    <h3 class="post-subtitle"><?php echo $post['summary']; ?></h3>
                                </a>
                                <p class="post-meta">
                                    Posted by
                                    <a href="#!"><?php echo $user['name']; ?></a>
                                    on <?php echo $post['created_at']; ?>
                                </p>
                            </div>
                            <!-- Divider-->
                            <hr class="my-4" />

                            <?php
                            }
                        ?>
                  

                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <?php include('includes/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
