<div class="row homeRow">

    <div class="collection with-header col s12 m6 l7">
        <h3 class="collection-header">My Groups</h3>
        @foreach($userGroups as $group)
            <a class="collection-item group-link" href="{{url('group',[$group->id])}}">{{$group->name}}</a>
        @endforeach
    </div>

    <div class="col s12 m6 l5">
        <form class="card" role="form" method="POST" action="{{ url('/group/new/all') }}" >

            {{ csrf_field() }}

            <div class="card-content">
                <h3>Add New</h3>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="group_id" type="text" name="group_id" class="validate" required>
                        <label for="group_id">Secret Key</label>
                    </div>
                </div>

                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </div>

        </form>

    </div>



</div>
