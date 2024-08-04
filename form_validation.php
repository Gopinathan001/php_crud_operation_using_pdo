<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/css/form.css">
    <title>Form Validation</title>
</head>

<body>
    <?php include 'db.php'; ?>
    <div class="container">
        <div class="form-wrap">
            <form action="" method="post" enctype="multipart/form-data">
                <h1 class="text-center">Form Validation</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"><span class="starsymbol">*</span>Name : </label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Email"><span class="starsymbol">*</span>E-mail : </label>
                            <input type="email" name="gmail" id="Email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dob"><span class="starsymbol">*</span>DOB : </label>
                            <input type="date" name="dob" id="dob" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age"><span class="starsymbol">*</span>Age : </label>
                            <input type="number" name="age" id="age" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ph"><span class="starsymbol">*</span>Phone Number : </label>
                            <input type="number" name="phonenum" id="ph" minlength="10" maxlength="10"
                                oninput="phonenumb(event)" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender"><span class="starsymbol">*</span>Gender :</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gen" value="Male" id="male" class="custom-control-input"
                                    required>
                                <label for="male" class="custom-control-label">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gen" value="Female" id="female" class="custom-control-input"
                                    required>
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state"><span class="starsymbol">*</span>State : </label>
                            <select id="state" name="state" class="form-control" required>
                                <option value="">Select State</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="city"><span class="starsymbol">*</span>City : </label>
                        <select id="city" name="city" class="form-control" required>
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="university"><span class="starsymbol">*</span>University Name : </label>
                            <select id="university" name="university" class="form-control" required>
                                <option value="">Select University</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="college"><span class="starsymbol">*</span>College Name : </label>
                            <select id="college" name="college" class="form-control" required>
                                <option value="">Select College</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Address"><span class="starsymbol">*</span>Address : </label>
                            <textarea name="address" id="Address" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <input type="submit" class="btn btn-success btn-block" value="Submit" name="create">
                    </div>
                    <div class="col-md-6 mx-auto">
                        <input type="reset" value="Clear" class="btn btn-danger btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-reponsive box" id="table_view">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>SI_No</th>
                    <th>Name</th>
                    <th>Date Of Birth</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>State</th>
                    <th>City</th>
                    <th>University</th>
                    <th>College</th>
                    <th>Address</th>
                    <th>Ph No</th>
                    <th>E-mail ID</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($view_data) && !empty($view_data)){
                    $start_serial = ($page - 1) * $limit + 1;
                    $i = $start_serial;
                    foreach($view_data as $datas){
                        print_r("<tr>");
                        print_r("<td>".$i."</td>");
                        print_r("<td>".$datas['name']."</td>");
                        print_r("<td>".$datas['dob']."</td>");
                        print_r("<td>".$datas['age']."</td>");
                        print_r("<td>".$datas['gender']."</td>");
                        print_r("<td>".$datas['state']."</td>");
                        print_r("<td>".$datas['city']."</td>");
                        print_r("<td>".$datas['university']."</td>");
                        print_r("<td>".$datas['college']."</td>");
                        print_r("<td>".$datas['address']."</td>");
                        print_r("<td>".$datas['phonenum']."</td>");
                        print_r("<td>".$datas['email']."</td>");
                        print_r("<td><img src='http://localhost:8080/form_validation/static/img/".$datas['imgs']."' class='img-thumbnail' style='width:150px;height:120px;' alt='Image Not Uploaded'></td>");
                        print_r('<td><button name="edit"><a href="update.php?editid=' .  $datas['id'] . '"><span class="glyphicon glyphicon-edit"></span></a></button><button name="delete"><a href="form_validation.php?deleteid=' . $datas['id'] . '"><span class="glyphicon glyphicon-trash"></span></a></button></td>');
                        print_r("</tr>");
                        $i++;
                    }
                };
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="form_validation.php?page=1#table_view">First</a>
                    </li>
                    <li class="page-item"><a class="page-link"
                            href="form_validation.php?page=<?=  $Previous; ?>#table_view"><span>&laquo;</span>Previous</a>
                    </li>
                    <?php for($i=1; $i<=$pages; $i++) : ?>
                    <li class="page-item"><a class="page-link"
                            href="form_validation.php?page=<?=  $i; ?>#table_view"><?=  $i; ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item"><a class="page-link"
                            href="form_validation.php?page=<?=  $Next; ?>#table_view">Next<span>&raquo;</span></a></li>
                    <li class="page-item"><a class="page-link"
                            href="form_validation.php?page=<?=  $pages; ?>#table_view">Last</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="./static/js/form.js"></script>
</body>

</html>