<?php
include "proses.php";
$p = new pekerja();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arkademy Bootcamp</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">
            <img src="img/arkademy.png" width="50" class="d-inline-block align-top" alt="">
            ARKADEMY BOOTCAMP
        </a>
    </nav>

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12 col-em-12 pt-5">
                <a href="" class="btn btn-warning float-right" data-toggle="modal" data-target="#exampleModalCenter">ADD</a>

                <table class="table table-bordered mt-5">
                    <thead>
                        <tr class="bg-light text-center">
                            <th>Name</th>
                            <th>Work</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($p->select_all() as $data) : ?>
                            <tr>
                                <td><?= $data['nameworker'] ?></td>
                                <td><?= $data['namework'] ?></td>
                                <td>Rp.<?= $data['salary'] ?>,00</td>
                                <td class="text-center">
                                    <a href="aksi.php?aksi=delete&id=<?= $data['id'] ?>"><i class="fa fa-trash text-danger lead"></i></a>
                                    <a href="index.php?aksi=update&id=<?= $data['id'] ?>"><i class="fa fa-edit text-success lead"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['alert'])) : ?>
        <div class="modal fade modal-automatic" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-none">
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center p-3">
                        <p>
                            <i class="fa fa-check fa-5x text-success"></i>
                        </p>
                        <p>
                            <strong><?php echo $_SESSION['alert'] ?></strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endif;
    unset($_SESSION['alert']);
    ?>



    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">ADD DATA</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="aksi.php?aksi=addworker">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="name...">
                        </div>
                        <div class="form-group">
                            <select name="work" id="" aria-placeholder="Work" class="form-control text-muted" require>
                                <option value="" require disable>Work...</option>
                                <option value="Frontend Dev">Frontend Dev</option>
                                <option value="Backend Dev">Backend Dev</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="salary" id="" aria-placeholder="Work" class="form-control text-muted" require>
                                <option value="" require disable>Salary...</option>
                                <option value="10.000.000">10.000.000</option>
                                <option value="12.000.000">12.000.000</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'update') {
            ?>

            <!-- Modal -->
            <div class="modal fade modal-automatic" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">ADD DATA</h5>
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="aksi.php?aksi=update">
                            <div class="modal-body">
                                <?php foreach ($p->update() as $fild) : ?>
                                    <input type="hidden" class="form-control" name="id" placeholder="name..." value="<?= $fild['id'] ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="name..." value="<?= $fild['nameworker'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="work" id="" aria-placeholder="Work" class="form-control text-muted" require>
                                            <option value="<?= $fild['namework'] ?>"><?= $fild['namework'] ?></option>
                                            <?php
                                                        if ($fild['namework'] == 'Frontend Dev') {
                                                            echo '  <option value="Backend Dev">Backend Dev</option>';
                                                        } elseif ($fild['namework'] == 'Backend Dev') {
                                                            echo '<option value="Frontend Dev">Frontend Dev</option>';
                                                        }
                                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="salary" id="" aria-placeholder="Work" class="form-control text-muted" require>
                                            <option value="" value="<?= $fild['salary'] ?>"><?= $fild['salary'] ?></option>
                                            <?php
                                                        if ($fild['salary'] == '10.000.000') {
                                                            echo ' <option value="12000000">12.000.000</option>';
                                                        } elseif ($fild['salary'] == '12.000.000') {
                                                            echo '<option value="10.000.000">10.000.000</option>';
                                                        }
                                                        ?>
                                        </select>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">EDIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php
        }
    } ?>


    <script src="js/jquery-4.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="font-awesome/all.min.js"></script>
    <script>
        $('.modal-automatic').modal('show');
    </script>
</body>

</html>