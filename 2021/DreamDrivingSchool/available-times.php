<div class="modal-header p-5 pb-4 border-bottom-0">
    <h2 class="fw-bold mb-0">Let's get some booking details off you...</h2>
</div>
<div class="modal-body p-5 pt-0">
    <form class="" action="book.php" method="POST">
        <div class="form-floating mb-3">
            <input type="date" class="form-control rounded-4" id="floatingLDate"  name="lessonDate"  placeholder="01/11/2021">
            <label for="floatingLDate">Lesson Date</label><span class="glyphicon glyphicon-calendar"></span>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="floatingStartTime" name="startTime" placeholder="09:30">
            <label for="floatingStartTime">Start Time</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select"  name="duration"  id="floatingDuraton">
                <option value="1" selected>1 Hour</option>
                <option value="1.5">1.5 Hours</option>
                <option value="2">2 Hours</option>
            </select>
            <label for="floatingDuration">Lesson Duration</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select"  name="lessonType"  id="floatingLessonType">
                <option value="newdriver" selected>New Driver Introduction</option>
                <option value="practise">Learner Practise</option>
                <option value="testprep">Test Preparation</option>
            </select>
            <label for="floatingLessonType">Lesson Type</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="floatingPickUp"  name="pickUpAddress" placeholder="123 Main Street">
            <label for="floatingPickUp">Pickup Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="floatingDropOff"  name="dropOffAddress" placeholder="123 Main Street">
            <label for="floatingDropOff">Drop Off Address</label>
        </div>
        <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="book-final-submit">Sign up</button>
        <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
    </form>
</div>
