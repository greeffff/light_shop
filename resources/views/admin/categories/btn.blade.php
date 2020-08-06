<a href="{{route('admin.categories.edit',['category'=>$model->id])}}" class="btn btn-outline-secondary">
    <i class="fas fa-edit"></i>
</a>
<button data-content="{{$model->id}}" class="btn btn-outline-secondary remote">
    <i class="fas fa-trash"></i>
</button>
