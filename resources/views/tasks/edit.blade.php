@include('layout.sidebar')
<header class="header">
    <h1 class="text-center">Edit Task</h1>
    <div>
        <a class="btnType_1" href="{{ route('tasks.index') }}">Back</a>
    </div>
</header>

<style>
    .form_wrapper {
        background: black;
        max-width: 700px;
        width: 100%;
        margin: 0 auto;
        padding: 40px 70px;
        border-radius: 30px;
    }

    .permission_form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .btnType_1 {
        width: 80px;
        height: 40px;
        padding: 20px 76px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        border-radius: 20px;
        background: white;
        color: black;
        text-transform: uppercase;
        font-weight: 600;
        transition: 0.3s all ease-in;
    }

    .btnType_1:hover {
        background: rgb(105, 103, 103);
        color: rgb(240, 222, 222);
    }
</style>

<section class="create_permissions mt-5">
    <div class="container">
        <div class="col-md-12">
            <div class="form_wrapper">
                <h2 class="text-center text-white mb-5">Edit Task Form</h2>
                <form class="permission_form" action="{{ route('tasks.update', $task->id) }}" method="post">
                    @csrf
                    <div class="col-md-8">
                        <input placeholder="Enter Task Name" name="name" class="form-control" type="text"
                            value="{{ old('name', $task->name) }}" />

                        @error('name')
                            <p class=" mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-8 mt-3">
                        <textarea class="form-control" placeholder="Task Discription Here..." name="description" id="" rows="3">{{ old('discription', $task->description) }}</textarea>
                        @error('description')
                            <p class=" mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-8 mt-3">
                        <input placeholder="Enter Assigned Hours" name="assigned_hours" class="form-control"
                            type="text" value="{{ old('assigned_hours', $task->assigned_hours) }}" />

                        @error('assigned_hours')
                            <p class=" mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-md-8 mt-3">
                        <select class="form-control" name="project_id">
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option {{ $task->project_id == $project->id ? 'selected' : '' }}
                                    value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>

                        @error('project_id')
                            <p class=" mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-8 mt-3">
                        <select class="form-control" name="user_id">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option {{ $task->user_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        @error('user_id')
                            <p class=" mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-8 mt-4 gap-2">
                        <button class="btnType_1"> Update </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
