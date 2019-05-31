@extends('_layouts.wrapper')

@section('heading')
<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col-6">
            <h4>Sign In</h4>
            <hr>
        </div>
        <div class="col-6">
            <h4>Sign Up</h4>
            <hr>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    {{-- SIGN IN FORM ============================================================================================================================= --}}
    <div class="col-6">
        <form action="/signin" method="POST">@csrf
            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" class="form-control" name="username" aria-describedby="emailHelpId" placeholder="Email">
                <small id="emailHelpId" class="form-text text-muted">Email</small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-info">Sign In</button>
        </form>
    </div>

    {{-- SIGN UP FORM ============================================================================================================================= --}}
    <div class="col-6">
        <form action="/signup" method="POST" id="signup-form">@csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Name">
                <small id="helpId" class="form-text text-muted">Your full name</small>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Username">
                        <small id="helpId" class="form-text text-muted">username</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Email">
                        <small id="emailHelpId" class="form-text text-muted">Email</small>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number"
                    class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="Phone">
                <small id="helpId" class="form-text text-muted">Phone</small>
            </div>

            

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="null">Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="date"
                            class="form-control" name="dob" id="dob" aria-describedby="helpId" placeholder="Date of birth">
                        <small id="helpId" class="form-text text-muted">Date of birth</small>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
            </div>
                        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subdistrict">Subdistrict</label>
                        <input type="text" class="form-control" name="subdistrict" id="subdistrict" aria-describedby="helpId" placeholder="Subdistrict">
                        <small id="helpId" class="form-text text-muted">Subdistrict</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" aria-describedby="helpId" placeholder="City">
                        <small id="helpId" class="form-text text-muted">City</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" name="province" id="province" aria-describedby="helpId" placeholder="Province">
                        <small id="helpId" class="form-text text-muted">Province</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="number"
                            class="form-control" name="postal_code" id="postal_code" aria-describedby="helpId" placeholder="Postal Code">
                        <small id="helpId" class="form-text text-muted">Postal Code</small>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation">
            </div>

            <button type="submit" class="btn btn-info">Sign Up</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
     // add the rule here
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "Value must not equal null.");
    $(document).ready(function () {
        $('#signup-form').validate({
            rules: {
                name: 'required',
                username: 'required',
                email: {
                    required: true,
                    email: true
                },
                phone: 'required',
                gender: {
                    valueNotEquals: 'null'
                },
                dob: 'required',
                address: 'required',
                subdistrict: 'required',
                city: 'required',
                province: 'required',
                postal_code: 'required',
                password: 'required',
                password_confirmation: {
                    required: true,
                    equalTo: '#password'
                }
            }
        });
    })
</script>
@endsection