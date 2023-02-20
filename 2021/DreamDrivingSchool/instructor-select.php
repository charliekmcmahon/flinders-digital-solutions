<div class="text-center mb-5">
    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3"><i class="fi fi-br-checkbox"></i></div>
    <h2 class="fw-bolder">Which instructor would you like?</h2>
    <p class="lead fw-normal text-muted mb-0">Each instructor has differing lesson types.</p>
    <br>
    <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <?php
                            $sql = "SELECT * FROM `tblInstructorData`";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo '<div class="col mb-5 mb-5 mb-xl-0">';
                                    echo '<div class="text-center">';
                                    echo '<img class="img-fluid rounded-circle mb-4 px-4" src="assets/instructors/' . $row["instructorID"]. '.jpeg" alt="..."></img>';
                                    echo '<h5 class="fw-bolder">' . $row["firstName"]. ' ' . $row["lastName"] . '</h5>';
                                    echo '<div class="fst-italic text-muted">' . $row["vehicleTransmission"]. ' ' . $row["vehicleType"] . '</div>';
                                    //echo "Instructor #" . $row["instructorID"]. " - " . $row["firstName"]. " - Lesson type: " . $row["vehicleTransmission"] . " " . $row["vehicleType"] . " ";
                                    echo '<form action="book.php" method="POST" class="m-3"><button type="submit" name="instructor-select" value="'.$row["instructorID"].'" class="btn btn-primary">Book ' . $row["firstName"] .' <i class="fi fi-br-arrow-right"></i></button></form>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                            else {
                                echo "0 results";
                            }
                        ?>
                    </div>
                </div>
            </section>

</div>