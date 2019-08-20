<div class="modal fade" id="ajax-show-image" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="userCrudModal">{{$student->name}}</h1>
            </div>
            <div class="modal-body">
                <img src="images/{{$student->image}}" width="570px" height="300px"/>
                <!-- The Modal -->
            </div>
        </div>
    </div>
</div>