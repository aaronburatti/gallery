<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>

                <?php
                //
                //
                // $result_set = User::find_all_users();
                // while($row = mysqli_fetch_array($result_set)){
                //
                //   echo $row['id'];
                // }

                $found =  User:: find_user_id(1);
                $user = User::instantiation($found);


                echo $user->id;


                 ?>


            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
