<div class='row' id='ok'>
<div class='col-md-12'>
  <div class='widget-area no-padding blank'>
    <div class='status-upload'>
      {!! Form::open(['url' => 'postForm/Submit', 'enctype' => 'multipart/form-data', 'class' => 'ajax-form']) !!}
        {{ Form::textarea('textarea', '', ['class' => 'form-control', 'placeholder' => 'What are you doing right now?', 'name' => 'message', 'id' => 'textarea']) }}
        <img id='img-upload'/>
        <ul>
          <li><a title='' data-toggle='tooltip' data-placement='bottom' data-original-title='Audio'><i class='fa fa-music'></i></a></li>
          <li><a title='' data-toggle='tooltip' data-placement='bottom' data-original-title='Video'><i class='fa fa-video-camera'></i></a></li>
          <li><a title='' data-toggle='tooltip' data-placement='bottom' data-original-title='Sound Record'><i class='fa fa-microphone'></i></a></li>
          <li class='img-gp'>
            <a>
              <label for='imgInp'><i class='fa fa-picture-o btn-file'></i></label>
              <input type="file" id="imgInp" name="myfile" class="input-file-group">
            </a>
          </li>
        </ul>
        <input type='hidden' name='uid' id="uid">
        <input type='hidden' name='postDate' id="postDate">
        <button type='submit' class='btn btn-primary btn-flatbtn' name='post' id="submit">Post</button>
      </form>
    </div><!-- Status Upload  -->
  </div><!-- Widget Area -->
</div>
</div>
@include('inc.errors')
