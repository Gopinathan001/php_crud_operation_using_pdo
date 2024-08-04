<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/css/form.css">
</head>
<body>
<?php include 'db.php'; ?>
<div class="container">
        <div class="form-wrap">
            <form action="" method="post" enctype="multipart/form-data">
            <h1 class="text-center">Update Form</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"><span class="starsymbol">*</span>Name : </label>
                            <input type="text" name="name" id="name" value="<?php echo $names; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Email"><span class="starsymbol">*</span>E-mail : </label>
                            <input type="email" name="gmail" id="Email" value="<?php echo $email; ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dob"><span class="starsymbol">*</span>DOB : </label>
                            <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age"><span class="starsymbol">*</span>Age : </label>
                            <input type="number" name="age" id="age" value="<?php echo $age; ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ph"><span class="starsymbol">*</span>Phone Number : </label>
                            <input type="tel" name="phonenum" id="ph" value="<?php echo $phonenum; ?>" minlength="10"  maxlength="10" oninput="phonenumb(event)" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="gender"><span class="starsymbol">*</span>Gender :</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="gen" value="Male" <?php if($gen == "Male") echo "checked"; ?> id="male" class="custom-control-input" required>
                            <label for="male" class="custom-control-label">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="gen" value="Female" <?php if($gen == "Female") echo "checked"; ?> id="female" class="custom-control-input" required>
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
                                <option value="Kerala"  <?php if ($state === "Kerala") echo "selected"; ?>>Kerala</option>
                                <option value="Manipur"  <?php if ($state === "Manipur") echo "selected"; ?>>Manipur</option>
                                <option value="Tamil Nadu"  <?php if ($state === "Tamil Nadu") echo "selected"; ?>>Tamil Nadu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="city"><span class="starsymbol">*</span>City : </label>
                            <select id="city" name="city" class="form-control" required>
                            <option value="">Select City</option>
                                <?php 
                                $citydata = [
                                    "Kerala" => ["Palakkad", "Thrissur"],
                                    "Manipur" => ["Bishnupur", "Chandel"],
                                    "Tamil Nadu" => ["Chennai", "Salem", "Coimbatore"]
                                ];
                                foreach($citydata[$state] as $cityname){
                                    $select = ($city === $cityname) ? "selected" : "";
                                    echo "<option value='$cityname' $select>$cityname</option>";
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="university"><span class="starsymbol">*</span>University Name : </label>
                            <select id="university" name="university" class="form-control" required>
                                <option value="">Select University</option>
                                <?php 
                                $universitydata = [
                                    "Chennai" => ["Anna University", "University of Madras"],
                                    "Salem" => ["Anna University", "Periyar University"],
                                    "Coimbatore" => ["Anna University", "Bharathiar University"],
                                    "Bishnupur" => ["Asian International University", "Bir Tikendrajit University"],
                                    "Chandel" => ["Central Agricultural University", "Dhanamanjuri University"],
                                    "Palakkad" => ["University of Kerala"],
                                    "Thrissur" => ["Kerala Agricultural University", "Mahatma Gandhi University"]
                                ];

                                foreach($universitydata[$city ] as $univer){
                                    $select = ($university === $univer) ? "selected" : "";
                                    echo "<option value='$univer' $select>$univer</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="college"><span class="starsymbol">*</span>College Name : </label>
                            <select id="college" name="college" class="form-control" required>
                                <option value="">Select College</option>
                                <?php 
                                $clgname = [
                                    "Anna University" => ["AVS Engineering College"],
                                    "Periyar University" => ["AVS College of Arts Science"],
                                    "Bharathiar University" => ["PSG Arts and science College"],
                                    "Asian International University" => ["Bishnupur Engineering College"],
                                    "Bir Tikendrajit University" => ["Bir Tikendrajit arts and science college"],
                                    "Central Agricultural University" => ["Central Agricultural College"],
                                    "Dhanamanjuri University" => ["Dhanamanjuri Engineering College"],
                                    "University of Kerala" => ["palakkad Arts and Science College"],
                                    "Mahatma Gandhi University" => ["Mahatma Gandhi Engineering College"],
                                    "Kerala Agricultural University" => ["Kerala Arts and Science College"]
                                ];

                                foreach($clgname[$university ] as $clg){
                                    $select = ($college === $clg) ? "selected" : "";
                                    echo "<option value='$clg' $select>$clg</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="file" name="image" id="image" onchange="imgPreview()" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img id="imgPreview" src="<?php echo 'http://localhost:8080/form_validation/static/img/'.$imgs; ?>" class="img-thumbnail" alt="Image Not Uploaded">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Address"><span class="starsymbol">*</span>Address : </label>                            
                            <textarea name="address" id="Address" class="form-control" required><?php echo $address; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <input type="submit" class="btn btn-primary btn-block" value="Update" name="edit">
                    </div>
                    <div class="col-md-6 mx-auto">
                        <input type="reset" value="Cancel" id="updateCancel" class="btn btn-danger btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="./static/js/form.js"></script>  
</body>
</html>