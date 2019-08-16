<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="studentCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form id="studentForm" name="studentForm" class="form-horizontal"
                      action="{{route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="student_id" id="student_id" value="{{$student->id}}">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-12">Class</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="class_code">
                                <option value="">Please enter a class ...</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}" {{$student->ClassM->id == $class->id ? 'selected' : ''}}>{{$class->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                <strong id="class_code-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                   value="{{$student->name}}" maxlength="50" required="">
                            <input type="hidden" value="{{$student->id}}" id="student_id_form" name="student_id">
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Birthday</label>
                        <div class="col-sm-12">
                            <input type="date" name="birthday" class="form-control" id="birthday"
                                   value="{{$student->birthday}}">
                            <span class="text-danger">
                                <strong id="birthday-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Phone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone"
                                   value="{{$student->phone}}" required="">
                            <span class="text-danger">
                                <strong id="phone-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="image" name="image">
                            <img src="images/{{$student->image}}" style="width: 200px; height: 150px">
                            <span class="text-danger">
                                <strong id="image-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Address</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address"
                                   placeholder="Enter Address"
                                   value="{{$student->address}}" required="">
                            <span class="text-danger">
                                <strong id="address-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Gender</label>
                        <div class="col-sm-12">
                            <input name="gender" value="1" type="radio" @if($student->gender == 1) checked @endif>Male
                            <input name="gender" value="2" type="radio" @if($student->gender == 2) checked @endif>Female
                            <input name="gender" value="3" type="radio" @if($student->gender == 3) checked @endif>Other
                        </div>
                        <span class="text-danger">
                                <strong id="gender-error"></strong>
                            </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="edit_student">Save changes
                </button>
            </div>
        </div>
    </div>
</div>