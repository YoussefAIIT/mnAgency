@extends("layouts.master")

@section('content')

    <div class="container-fluid" id="app">
        <div class="row justify-content-center">



            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">Sign Up Your User Account</h2>

                    <form id="msform" enctype="multipart/form-data" style="    margin: 20px;">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Account</strong></li>
                            <li id="personal"><strong>Personal</strong></li>
                            <li id="payment"><strong>Image</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Account Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Email: *</label>
                                <input v-on:keyup="checkAccountInfo" type="email" name="email" v-model="User.email" placeholder="Email Id" />
                                <label class="fieldlabels">Username: *</label>
                                <input v-on:keyup="checkAccountInfo" type="text" name="uname" v-model="User.username" placeholder="UserName" />
                                <label class="fieldlabels">Password: *</label>
                                <input v-on:keyup="checkAccountInfo" type="password" v-model="User.password" name="pwd" placeholder="Password" />
                                <label class="fieldlabels">Confirm Password: *</label>
                                <input v-on:keyup="checkAccountInfo" type="password" v-model="User.confirmpassword" name="cpwd" placeholder="Confirm Password" />
                            </div>
                            <input :disabled="isActive"  type="button" v-on:click="next" name="next" class="next action-button"  value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Personal Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">First Name: *</label>
                                <input v-on:keyup="checkPersonalInfo" type="text" name="fname" v-model="User.firstname" placeholder="First Name" />
                                <label class="fieldlabels">Last Name: *</label>
                                <input v-on:keyup="checkPersonalInfo" type="text" v-model="User.lastname" name="lname" placeholder="Last Name" />
                                <label class="fieldlabels">Contact No.: *</label>
                                <input v-on:keyup="checkPersonalInfo" type="text" name="phno" v-model="User.contactno" placeholder="Contact No." />
                                <label class="fieldlabels">Alternate Contact No.: *</label>
                                <input v-on:keyup="checkPersonalInfo" v-model="User.alternatecontact" type="text" name="phno_2" placeholder="Alternate Contact No." />
                            </div>
                            <input :disabled="isActive"  type="button" v-on:click="next" name="next" class="next action-button"  value="Next" />
                            <input type="button"  v-on:click="previous" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Image Upload:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" @change="selectFile" accept="image/*">
                                <label class="fieldlabels">Upload Signature Photo:</label>
                                <input type="file" name="pic" accept="image/*">
                            </div>

                            <input :disabled="isActive" type="button"   name="next" class="next action-button" v-on:click="sendData" value="Submit" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 4</h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>

                    <p>Fill all form field to go to next step</p>
                    <p v-if="errors.length">
                        <b>Please correct the following error(s):</b>
                    <ul class="error">
                        <li v-for="error in errors"> @{{ error }}</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script_js')
    <script>
        window.Laravel={!! json_encode([
            "csrf_token" =>csrf_token(),
            "url"=>url('/')])!!};
    </script>
    <script>


        var app = new Vue({
            el: '#app',
            data: {
                isActiveBtnNext1:true,
                isActive:true,
                message: 'Hello Vue!',
                errors:[],
                open:false,
                disabled:"disabled",
                User:{
                    email:"",
                    username:"",
                    password:"",
                    confirmpassword:"",
                    firstname:"",
                    lastname:"",
                    contactno:"",
                    alternatecontact:"",
                    photo:"",
                    signaturephoto:"",
                }
            },
            methods:{

                sendData:function(){

                    /*validation images */
                    if (!this.User.photo)
                        this.errors.push('photo required.');



                    /*Preparation donner*/
                    var bodyFormData = new FormData();

                    bodyFormData.append('email',this.User.email);
                    bodyFormData.append('username',this.User.username);
                    bodyFormData.append('password',this.User.password);
                    bodyFormData.append('confirmpassword',this.User.confirmpassword);
                    bodyFormData.append('firstname',this.User.firstname);
                    bodyFormData.append('lastname',this.User.lastname);
                    bodyFormData.append('contactno',this.User.contactno);
                    bodyFormData.append('alternatecontact','this.User.alternatecontact');
                    bodyFormData.append('photo',this.User.photo);



                    const headers = {'Content-Type': 'multipart/form-data'};
                    /* Send Data*/
                    axios.post(window.Laravel.url+'/saveNewUser',bodyFormData,{headers: headers})
                        .then(res=>{
                            //if etat ok res statut
                            localStorage.removeItem('User');


                        })
                        .catch(function (error) {
                            if (error.response) {

                                console.log(error.response.data);
                                console.log(error.response.status);
                                console.log(error.response.headers);
                            } else if (error.request) {

                                console.log(error.request);
                            } else {

                                console.log('Error', error.message);
                            }
                            console.log(error.config);
                        })
                },
                next:function()
                {
                    this.saveDataLocal();
                    this.manageBtnActive();
                },
                validEmail: function (email) {
                    //var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    //return re.test(email);
                    return true;
                },

                selectFile(event) {
                    // `files` is always an array because the file input may be in multiple mode

                    this.User.photo = event.target.files[0];
                    if(!this.User.photo)
                        this.manageBtnActive();

                    this.isActive=false;
                    console.log("U are selecting the file");
                },
                saveDataLocal()
                {
                    const parsed = JSON.stringify(this.User);
                    localStorage.setItem('User', parsed);
                },
                checkAccountInfo(){



                    this.errors=[];
                    if (!this.User.email)
                        this.errors.push('Email required.');
                    if (!this.validEmail(this.email))
                        this.errors.push('Valid email required.');
                    if (!this.User.username)
                        this.errors.push('username required.');

                    if (!this.User.password)
                        this.errors.push('password required.');
                    else
                        if (this.User.password != this.User.confirmpassword)
                                this.errors.push('password confirmation');


                    if(!this.errors.length)
                        this.manageBtnActive();


                    console.log(this.errors);

                },
                checkPersonalInfo()
                {
                    this.errors=[];
                    if (!this.User.firstname)
                        this.errors.push('firstname required.');
                    if (!this.User.lastname)
                        this.errors.push('lastname required.');
                    if (!this.User.contactno)
                        this.errors.push('contactno required.');
                    if (!this.User.alternatecontact)
                        this.errors.push('alternatecontact required.');

                    if(!this.errors.length)
                        this.manageBtnActive();

                    console.log(this.errors);
                },
                manageBtnActive(){
                    this.isActive=!this.isActive;
                },
                previous(){
                    this.manageBtnActive();
                    this.errors=[];
                },
                reversebooleanValue( btn)
                {

                }



            },
            mounted:function() {

                if (localStorage.getItem('User'))
                {
                    let data=JSON.parse(localStorage.getItem('User'));

                    //console.log(JSON.parse(localStorage.getItem('User')));
                    this.User.email=JSON.parse(localStorage.getItem('User')).email;
                    this.User.username=data.username;
                    this.User.password=data.password;
                    this.User.confirmpassword=data.confirmpassword;
                    this.User.firstname=data.firstname;
                    this.User.lastname=data.lastname;
                    this.User.contactno=JSON.parse(localStorage.getItem('User')).contactno;
                    this.User.alternatecontact=data.alternatecontact;

//                    this.manageBtnActive();

                    console.log(this.isActive);
                    this.reversebooleanValue(this.isActive);
                    console.log(this.isActive);
                }
                //this.isActive=false;


            },
        });
    </script>
@endsection