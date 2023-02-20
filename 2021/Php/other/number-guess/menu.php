<div class="col-lg-8 mx-auto p-3 py-md-5">
  <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
    <a href="" class="d-flex align-items-center text-dark text-decoration-none">
      <span class="fs-4">Number Guess Game™</span>
    </a>
  </header>

  <h1>Choose your difficulty...</h1>
  <br>
  <div class="mb-5">
  <form action="index.php" method="post">
    <input type="submit" class="btn btn-primary btn-lg px-4" data-toggle="tooltip" title="Between 1-10" name="someAction" value="Easy" />
    <input type="submit" class="btn btn-primary btn-lg px-4" data-toggle="tooltip" title="Between 1-100" name="someAction" value="Medium" />
    <input type="submit" class="btn btn-primary btn-lg px-4" data-toggle="tooltip" title="Between 1-1000" name="someAction" value="Hard" />
    <input type="submit" class="btn btn-primary btn-lg px-4" data-toggle="tooltip" title="Between -100-100" name="someAction" value="Expert+" />
    </form>
  </div>

  <script>
        $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>