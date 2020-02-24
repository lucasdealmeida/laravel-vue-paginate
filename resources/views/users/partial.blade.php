<div>
    <form method="get" action="{{ route('users') }}" v-on:submit.prevent="$emit(`search`, $event)">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="button-addon2">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                @include('components.ordered-header', ['title'=>'Name', 'field'=>'name'])
            </th>
            <th>
                @include('components.ordered-header', ['title'=>'Email', 'field'=>'email'])
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
