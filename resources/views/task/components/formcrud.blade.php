<div class="mt-5 mx-auto" style="width: 380px">
    <div class="card">
        <div class="card-body">
            <form
            action="{{ url("$formurl") }}"
            method='POST'
            >
                @csrf
                @isset($method)
                @method($method)
                @endisset
                <div class="mb-3">
                    <label for="" class="form-label">User</label>
                    <input
                    name="user"
                    type="text"
                    class="form-control"
                    @if (isset($task))
                    value="{{ old('user',$task->user) }}"

                    @else
                    value="{{ old('user') }}"

                    @endif
                    >
                    @error('user')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Task</label>
                    <textarea name='task' class="form-control" id="" rows="3">@if (isset($task)){{ old('task',$task->task) }} @else {{ old('task') }} @endif</textarea>
                    @error('task')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button type="submit" class="{{ $button['class'] }}">{{ $button['text'] }}</button>
            </form>
        </div>
    </div>
</div>
