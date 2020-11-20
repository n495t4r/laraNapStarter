<template>
    <div class="container">
       <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">MONITORS</h3>

                <div class="card-tools">
                  <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add new <i class="fa fa-user-plus fa-fw"></i> </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>State of Origin</th>
                      <th>Registered at</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="monitor in monitors" :key="monitor.id">
                      <td>{{monitor.id}}</td>
                      <td>{{monitor.first_name | toUpper}}</td>
                      <td>{{monitor.email}}</td>
                      <td>{{monitor.origin}}</td>
                      <td>{{monitor.created_at | the_date}}</td>
                      <td>
                          <a href="#">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          <a href="#">
                              <i class="fa fa-trash red"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- Modal -->
            <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewLabel">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
            <form @submit.prevent="createMonitor" >
                <div class="modal-body">
    
                    <div class="form-group">
                        <input v-model="form.first_name" type="text" name="first_name"
                        placeholder="First Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                        <has-error :form="form" field="first_name"></has-error>
                    </div>
                    <div class="form-group">
                        <input v-model="form.last_name" type="text" name="last_name"
                        placeholder="Last Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                        <has-error :form="form" field="last_name"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.email" type="text" name="email"
                            placeholder="Email Address"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.phone" type="text" name="phone"
                            placeholder="Phone number"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                        <has-error :form="form" field="phone"></has-error>
                    </div>
                    <div class="form-group">
                        <select v-model="form.lga_residence" type="text" name="lga_residence" id="lga_residence"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('lga_residence') }">
                            <option value="">Select LGA</option>
                            <option value="Abaji">Abaji</option>
                            <option value="AMAC">AMAC</option>
                        </select>
                        <has-error :form="form" field="lga_residence"></has-error>
                    </div>
                    <div class="form-group">
                        <input v-model="form.dob" type="date" name="dob"
                            placeholder="Date of Birth"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('dob') }">
                        <has-error :form="form" field="dob"></has-error>
                    </div>
                    <div class="form-group">
                        <select v-model="form.origin" type="text" name="origin" id="origin"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('origin') }">
                            <option value="">Select State of Origin</option>
                            <option value="FCT">FCT</option>
                            <option value="BU">Bauchi</option>
                        </select>
                        <has-error :form="form" field="origin"></has-error>
                    </div>
                    <div class="form-group">
                        <select v-model="form.lga_origin" type="text" name="lga_origin" id="lga_origin"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('lga_origin') }">
                            <option value="">Select LGA</option>
                            <option value="Abaji">Abaji</option>
                            <option value="AMAC">AMAC</option>
                        </select>
                        <has-error :form="form" field="lga_origin"></has-error>
                    </div>
                    <div class="form-group">
                        <select v-model="form.residence" type="text" name="residence" id="residence"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('residence') }">
                            <option value="">Select State of Residence</option>
                            <option value="FCT">FCT</option>
                            <option value="BU">Bauchi</option>
                        </select>
                        <has-error :form="form" field="residence"></has-error>
                    </div>
                    <div class="form-group">
                        <select v-model="form.gender" type="text" name="gender" id="gender"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('gender') }">
                            <option value="">Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        <has-error :form="form" field="gender"></has-error>
                    </div>
                    <div class="form-group">
                        <input v-model="form.address" type="text" name="address"
                            placeholder="Home Address"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                        <has-error :form="form" field="address"></has-error>
                    </div>
                    <div class="form-group">
                        <select v-model="form.marital_status" type="text" name="marital_status" id="marital_status"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('marital_status') }">
                            <option value="">Marital Status</option>
                            <option value="1">Married</option>
                            <option value="2">Single</option>
                        </select>
                        <has-error :form="form" field="marital_status"></has-error>
                    </div>
          
                    <div class="form-group">
                        <textarea v-model="form.bio" type="text" name="bio" id="bio"
                            placeholder="Short bio (optional)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                        </textarea>
                        <has-error :form="form" field="bio"></has-error>
                    </div>

                    <div class="form-group">
                        <select v-model="form.type" type="text" name="type" id="type"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                            <option value="">Select User Role</option>
                            <option value="monitor">Monitor</option>
                            <option value="coord" disabled>Coordinator</option>
                        </select>
                        <has-error :form="form" field="type"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.password" type="password" name="password"
                        placeholder="Password"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
                </div>
            </div>
            </div>
    </div>
</template>

<script>
    export default {
       
        data () {
            return {
                monitors: {},
                form: new Form({
                    first_name: '',
                    middle_name: '',
                    last_name: '',
                    phone: '',
                    alt_phone: '',
                    email: '',
                    gender: '', 
                    dob: '',
                    address: '',
                    origin: '',
                    lga_origin: '',
                    residence: '',
                    lga_residence: '',
                    marital_status: '',
                    bank_name: '',
                    acct_number: '',
                    type: '',
                    unique_id: '',
                    sponsor_fullname: '',
                    sponsor_designation: '',
                    sponsor_address: '', 
                    sponsor_phone: '',
                    password: '',
                    bio: '',
                    photo: ''
                })
            }
        },
         methods: {

            loadMonitors(){
                axios.get("api/monitor").then(({data}) => (this.monitors = data.data));
            },

            createMonitor () {
              this.$Progress.start();
                this.form.post('api/monitor');
                Fire.$emit("Created");
                $("#addNew").modal("hide");
                Toast.fire({
                    icon: 'success',
                    title: 'Monitor created successfully'
                });
                this.$Progress.finish();
            }
        },
        created() {
            this.loadMonitors();
            Fire.$on('Created', ()=> {
                this.loadMonitors();
            });
        }
    }
</script>
