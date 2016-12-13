<div class="row groupsRow">
    <div class="collection with-header col s12 m6 l7">
        <h3 class="collection-header">{{$group->name}}</h3>
        @foreach($group->articles as $article)
            <a class="collection-item truncate" href="{{url('article',[$article->id])}}">{{$article->title}}</a>
        @endforeach
    </div>

    <div class="col s12 m6 l5">
        <form class="card" role="form" method="POST" action="{{ url('/article/create') }}" >

            {{ csrf_field() }}

            <div class="card-content">
                <h3>Add Article</h3>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="url" type="text" name="url" class="validate" required>
                        <label for="url">URL to article</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="summary" name ="summary" class="materialize-textarea"></textarea>
                        <label for="summary">Summary</label>
                    </div>
                </div>

                <div class="row">

                    <input type="hidden" name="group_id" value="{{$group->id}}">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </div>

        </form>

    </div>


</div>
