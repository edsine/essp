<div class="preview-block">
    <span class="preview-title-lg overline-title">Personal Details</span>
    <div class="row gy-4">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="last_name" name="last_name" value="{{old('last_name', $employee->last_name ?? '')}}">
                    <label class="form-label-outlined" for="last_name">Last Name</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="middle_name" name="middle_name" value="{{old('middle_name', $employee->middle_name ?? '')}}">
                    <label class="form-label-outlined" for="middle_name">Middle Name</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="first_name" name="first_name" value="{{old('first_name', $employee->first_name ?? '')}}">
                    <label class="form-label-outlined" for="first_name">First Name</label>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <select class="form-select js-select2" data-ui="xl" id="gender" name="gender">
                        <option value="Male" @selected(old('gender', $employee->gender ?? '') == "Male")>Male</option>
                        <option value="Female" @selected(old('gender', $employee->gender ?? '') == "Female")>Female</option>
                    </select>
                    <label class="form-label-outlined" for="gender">Gender</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-calendar-alt"></em>
                    </div>
                    <input type="text"
                        class="form-control form-control-xl form-control-outlined date-picker"  data-date-format="yyyy-mm-dd"
                        id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth', $employee->date_of_birth ?? '')}}">
                    <label class="form-label-outlined" for="date_of_birth">Date of Birth</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <select class="form-select js-select2" data-ui="xl" id="marital_status" name="marital_status">
                        <option value="Married" @selected(old('marital_status', $employee->marital_status ?? '') == "Married")>Married</option>
                        <option value="Single" @selected(old('marital_status', $employee->marital_status ?? '') == "Single")>Single</option>
                    </select>
                    <label class="form-label-outlined" for="marital_status">Marital Status</label>
                </div>
            </div>
        </div>
    </div>

    <hr class="preview-hr">
    <span class="preview-title-lg overline-title">Contact Details</span>
    <div class="row gy-4">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-mobile"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="phone_number" name="phone_number" value="{{old('phone_number', $employee->phone_number ?? '')}}">
                    <label class="form-label-outlined" for="phone_number">Phone</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-mobile"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="alternate_phone" name="alternate_phone" value="{{old('alternate_phone', $employee->alternate_phone ?? '')}}">
                    <label class="form-label-outlined" for="alternate_phone">Alternate
                        Phone</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-mail"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="email" name="email" value="{{old('email', $employee->email ?? '')}}">
                    <label class="form-label-outlined" for="email">Email</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-home"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="address" name="address" value="{{old('address', $employee->address ?? '')}}">
                    <label class="form-label-outlined" for="address">Address</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <select class="form-select js-select2" data-ui="xl" id="state_of_origin"
                        name="state_of_origin" data-search="on" required>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}" @selected(old('state_of_origin', $employee->state_of_origin ?? '')==$state->id)>{{ $state->name }}
                            </option>
                        @endforeach
                    </select>
                    <label class="form-label-outlined" for="outlined-select">State</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <select class="form-select js-select2" data-ui="xl" id="local_govt_area"
                        name="local_govt_area" data-placeholder="Select LGA" data-search="on"
                        required>
                    </select>
                    <label class="form-label-outlined" for="local_govt_area">LGA</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <select class="form-select js-select2" data-ui="xl"
                        id="means_of_identification" name="means_of_identification">
                        <option value="NIN" @selected(old('means_of_identification', $employee->means_of_identification ?? '')=='NIN')>NIN</option>
                        <option value="Driver's License" @selected(old('means_of_identification', $employee->means_of_identification ?? '')=="Driver's License")>Driver's License
                        </option>
                    </select>
                    <label class="form-label-outlined" for="means_of_identification">Mode of
                        Identity</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-cc-alt"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="identity_number" name="identity_number" value="{{old('identity_number', $employee->identity_number ?? '' ?? '')}}">
                    <label class="form-label-outlined" for="identity_number">Identity
                        Number</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-calendar-alt"></em>
                    </div>
                    <input type="text"
                        class="form-control form-control-xl form-control-outlined date-picker"  data-date-format="yyyy-mm-dd"
                        id="identity_issue_date" name="identity_issue_date" value="{{old('identity_issue_date', $employee->identity_issue_date ?? '')}}">
                    <label class="form-label-outlined" for="identity_issue_date">Issue Date</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="preview-hr">
    <span class="preview-title-lg overline-title">Work Details</span>
    <div class="row gy-4">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-cc-alt"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="staff_id" name="staff_id" value="{{old('staff_id', $employee->staff_id ?? '')}}">
                    <label class="form-label-outlined" for="staff_id">Work ID</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-calendar-alt"></em>
                    </div>
                    <input type="text"
                        class="form-control form-control-xl form-control-outlined date-picker"  data-date-format="yyyy-mm-dd"
                        id="employment_date" name="employment_date" value="{{old('employment_date', $employee->employment_date ?? '')}}">
                    <label class="form-label-outlined" for="employment_date">Employment
                        Date</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-briefcase"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="job_title" name="job_title" value="{{old('job_title', $employee->job_title ?? '')}}">
                    <label class="form-label-outlined" for="job_title">Job Title</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-sign-kobo"></em>
                    </div>
                    <input type="number" class="form-control form-control-xl form-control-outlined"
                        id="monthly_remuneration" name="monthly_remuneration" value="{{old('monthly_remuneration', $employee->monthly_remuneration ?? '')}}">
                    <label class="form-label-outlined" for="monthly_remuneration">Monthly
                        Remuneration</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="preview-hr">
    <span class="preview-title-lg overline-title">Next of Kin
        Details</span>
    <div class="row gy-4">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="next_of_kin" name="next_of_kin" value="{{old('next_of_kin', $employee->next_of_kin ?? '')}}">
                    <label class="form-label-outlined" for="next_of_kin">Name</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-mobile"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="next_of_kin_phone" value="{{old('next_of_kin_phone', $employee->next_of_kin_phone ?? '')}}">
                    <label class="form-label-outlined" for="next_of_kin_phone">Phone</label>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-mobile"></em>
                    </div>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="dependants_number" name="dependants_number" value="{{old('dependants_number', $employee->dependants_number ?? '')}}">
                    <label class="form-label-outlined" for="dependants_number">Dependants
                        Number</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="preview-hr">
    <div class="row g-4">
        <div class="col-12">
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block"><em
                        class="icon ni ni-save me-2"></em> Save
                    Employee Details</button>
            </div>
        </div>
    </div>
</div>
