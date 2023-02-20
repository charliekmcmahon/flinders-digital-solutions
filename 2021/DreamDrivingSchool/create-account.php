<div class="modal-header p-5 pb-4 border-bottom-0">
    <h2 class="fw-bold mb-0">First, let's get to know a bit about you...</h2>
</div>

<div class="modal-body p-5 pt-0">
    <form class="" action="book.php" method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="floatingFirstName" name="firstName" placeholder="John">
            <label for="floatingFirstName">First Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="floatingLastName" name="lastName"  placeholder="Smith">
            <label for="floatingLastName">Last Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-4" id="floatingEmail"  name="email"  placeholder="test@example.com">
            <label for="floatingEmail">Email Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" class="form-control rounded-4" id="floatingPhone"  name="phone"  placeholder="+61 400 400 400">
            <label for="floatingPhone">Phone Number</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control rounded-4" id="floatingDOB"  name="dateOfBirth"  placeholder="12/12/2004">
            <label for="floatingDOB">Birthdate</label><span class="glyphicon glyphicon-calendar"></span>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="floatingLicenseNumber"  name="licenseNumber" placeholder="101 202 303">
            <label for="floatingLicenseNumber">License Number (CRN)</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select"  name="state" id="floatingStateSelect">
                <option value="QLD" selected>Queensland</option>
                <option value="NSW">New South Wales</option>
                <option value="NT">Northern Territory</option>
                <option value="WA">Western Australia</option>
                <option value="TAS">Tasmania</option>
                <option value="SA">South Australia</option>
            </select>
            <label for="floatingStateSelect">State</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select"  name="gender"  id="floatingGender">
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <label for="floatingGender">Gender</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="floatingAddress"  name="address" placeholder="123 Main Street">
            <label for="floatingAddress">Address</label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" name="medicalCondition" id="medicalCondition">
            <label class="form-check-label" for="medicalCondition">I have a medical condition that affects my driving</label>
        </div>
        <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="user-create-submit">Sign up</button>
        <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
    </form>
</div>
