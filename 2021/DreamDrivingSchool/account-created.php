<div class="text-center mb-5">
    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3"><i class="fi fi-br-checkbox"></i></div>
    <h2 class="fw-bolder">Done! We have your information.</h2>
    <p class="lead fw-normal text-muted mb-0">Welcome to Dream Driving School, <?php echo $_SESSION["userFirstName"];?>!</p>
    <form action="book.php" method="POST" class="m-3">
        <button type="submit" name="continue-to-book" class="btn btn-primary">Continue to Book <i class="fi fi-br-arrow-right"></i></button>
    </form>
</div>