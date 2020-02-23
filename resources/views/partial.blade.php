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
                @if (request('sortBy') != 'name')
                    <a href="javascript:;" v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => 'name', 'direction' => 'asc']) }}`)">
                        <i class="fas fa-sort"></i>
                        Name
                    </a>
                @elseif (request('direction') == 'asc')
                    <a href="javascript:;" v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => 'name', 'direction' => 'desc']) }}`)">
                        <i class="fas fa-sort-up"></i>
                        Name
                    </a>
                @else
                    <a href="javascript:;" v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => 'name', 'direction' => 'asc']) }}`)">
                        <i class="fas fa-sort-down"></i>
                        Name
                    </a>
                @endif
            </th>
            <th>
                @if (request('sortBy') != 'email')
                    <a href="javascript:;" v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => 'email', 'direction' => 'asc']) }}`)">
                        <i class="fas fa-sort"></i>
                        Email
                    </a>
                @elseif (request('direction') == 'asc')
                    <a href="javascript:;" v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => 'email', 'direction' => 'desc']) }}`)">
                        <i class="fas fa-sort-up"></i>
                        Email
                    </a>
                @else
                    <a href="javascript:;" v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => 'email', 'direction' => 'asc']) }}`)">
                        <i class="fas fa-sort-down"></i>
                        Email
                    </a>
                @endif
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
