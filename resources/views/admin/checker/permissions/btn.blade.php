<a  class="btn btn-outline-secondary" data-id="{{$model->id}}" data-name="{{$model->name}}" data-display="{{$model->display_name}}" data-description="{{$model->description}}" data-toggle="modal" data-target="#editModal">
    <i class="fas fa-edit"></i>
</a>
<button data-content="{{$model->id}}" class="btn btn-outline-secondary remote">
    <i class="fas fa-trash"></i>
</button>
