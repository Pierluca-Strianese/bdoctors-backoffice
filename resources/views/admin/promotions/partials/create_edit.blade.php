<form class="p-5" action="{{ route($route , $promotion) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>
                  {{ $error }}
                </li>
              @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Prezzo</label>
        <input  type="text" class="form-control" name="price" value="{{ old('price', $promotion->price) }}" id="" >
    </div>

    <div class="mb-3">
        <label class="form-label">Durata</label>
        <input type="text" class="form-control" name="duration" value="{{ old('duration', $promotion->duration) }}" id="" >  
    </div>

    <div class="mb-3">
        <label class="form-label">specificità</label>
        <input type="text" class="form-control" name="specifics" value="{{ old('specifics', $promotion->specifics) }}" id="" >  
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>