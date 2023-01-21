<!-- This is a pop-up add -->

<?php
    session_start();
    require "connection.php";
    if(isset($_POST['submit']))
    {
        $pname = $_POST['title'];
        $phead = $_POST['phead'];
        $budget = $_POST['budget'];
        $doc = $_POST['doc'];
        $detail = $_POST['details'];
        $deliverable1 = $_POST['deliverable1'];
        $date1 = $_POST['date1'];
        $deliverable2 = $_POST['deliverable2'];
        $date2 = $_POST['date2'];
        $deliverable3 = $_POST['deliverable3'];
        $date3 = $_POST['date3'];

        $sql = "INSERT INTO `projectdetails` (`ptitle`, `phead`, `budget`, `doc`, `pdetail`, `deliverable1`, `date1`, `deliverable2`, `date2`, `deliverable3`, `date3`) VALUES ('$pname', '$phead', '$budget', '$doc', '$detail', '$deliverable1', '$date1', '$deliverable2', '$date2', '$deliverable3', '$date3');";
        $sql1 = "INSERT INTO `activity`(`ptitle`, `deliverable`, `date`, `detail`) VALUES ('$pname','$deliverable1','$date1','$detail');";
        $sql1 .= "INSERT INTO `activity`(`ptitle`, `deliverable`, `date`, `detail`) VALUES ('$pname','$deliverable2','$date2','$detail');";
        $sql1 .= "INSERT INTO `activity`(`ptitle`, `deliverable`, `date`, `detail`) VALUES ('$pname','$deliverable3','$date3','$detail');";
        try{
            $result = mysqli_multi_query($conn,$sql);
            $result2 =mysqli_multi_query($conn,$sql1);
            if($result)
            {

                header("location:index.php");
            }
            else{
                echo "error";
            }
        }
        catch(Exception $e)
        {
            echo "<h1 style='color:red'>Opps, This Project might exist Please Check the Dashboard</h1>";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h1 >Add Your Project Details</h1>
    <div class="container px-3 my-5">
        <form id="contactForm" method="post">
            <div class="mb-3">
                <label class="form-label" for="projectTitle">Project Title</label>
                <input class="form-control" id="projectTitle" type="text" name="title" placeholder="Project Title" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="projectTitle:required">Project Title is required.</div>
            </div>
            <div class="mb-3">
                <!-- <label class="form-label" for="projectHead">Project Head</label>
                <input class="form-control" id="projectHead" type="text" name="phead" placeholder="Project Head" data-sb-validations="required" /> -->
                <label class="form-label">Project Head</label>
                <select class="form-select" name="phead" id="phead" aria-label="Title">
                    <option>ROHIT</option>
                    <option>NAREN</option>
                    <option>SURYA</option>
                    <option>GAYATRI</option>
                </select>
                <div class="invalid-feedback" data-sb-feedback="projectHead:required">Project Head is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="budget">Budget</label>
                <input class="form-control" id="budget" type="text" name="budget" placeholder="Budget" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="budget:required">Budget is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="dateOfCompletion">Date Of Completion</label>
                <input class="form-control" id="dateOfCompletion" type="date" name="doc" placeholder="Date Of Completion" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="dateOfCompletion:required">Date Of Completion is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="details">Details</label>
                <input class="form-control" id="details" type="text" name="details" placeholder="Details" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="details:required">Details is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="deliverable1">Deliverable 1</label>
                <input class="form-control" id="deliverable1" type="text" name="deliverable1" placeholder="Deliverable 1" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="deliverable1:required">Deliverable 1 is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="data1">Data 1</label>
                <input class="form-control" id="data1" type="date" name="date1" placeholder="Data 1" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="data1:required">Data 1 is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="deliverable2">Deliverable 2</label>
                <input class="form-control" id="deliverable2" type="text" name="deliverable2" placeholder="Deliverable 2" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="deliverable2:required">Deliverable 2 is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="date2">Date 2</label>
                <input class="form-control" id="date2" type="date" name="date2" placeholder="Date 2" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="date2:required">Date 2 is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="devliverable3">Devliverable 3</label>
                <input class="form-control" id="devliverable3" type="text" name="deliverable3" placeholder="Devliverable 3" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="devliverable3:required">Devliverable 3 is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="date3">Date 3</label>
                <input class="form-control" id="date3" type="date" name="date3" placeholder="Date 3" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="date2:required">Date 3 is required.</div>
            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <input class="btn btn-primary" id="submitButton" name="submit" type="submit" value="Submit">
            </div>
        </form>
    </div>
    

</body>
</html>