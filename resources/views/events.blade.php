@if($events->isNotEmpty())

	<input type="hidden" name="enable_pagination" id="enable_pagination" value="@if( $events->lastPage() == $events->currentPage()) no @else yes @endif">
	
    @foreach($events As $key => $single_event)

    	@if($single_event->type == 'review')
    		@if(\App\Models\User::find($single_event->user_id))
	    	<li class="comment-msg @if($single_event->read == 0) un-read @endif">
		        <a href="#" class="inner-comment-row">
		            <div class="comment-icon"></div>
		            <div class="comment-text-wrap">
		                <div class="big-text">{{\App\Models\User::find($single_event->user_id)->name}} commented : </div>
		                <div class="small-text">
		                "{{\App\Models\Review::find($single_event->review_id)->comment}} "
		                </div>
		            </div>
		        </a>
		    </li>
		    @endif
	    @endif

	    @if($single_event->type == 'like')
	    	<li class="comment-msg @if($single_event->read == 0) un-read @endif">
		        <a href="#" class="inner-comment-row">
		            <div class="comment-icon"></div>
		            <div class="comment-text-wrap">
		                <div class="big-text">You have a new like </div>
		                <div class="small-text">
		                {{__('footer.total')}} {{$likes}} {{__('footer.likes')}}

		                </div>
		            </div>
		        </a>
		    </li>	
	    @endif


	    @if($single_event->type == 'view')
	    	@if(\App\Models\User::find($single_event->user_id))
	    	<li class="comment-msg @if($single_event->read == 0) un-read @endif">
		        <a href="#" class="inner-comment-row">
		            <div class="comment-icon"></div>
		            <div class="comment-text-wrap">
		                <div class="big-text">{{\App\Models\User::find($single_event->user_id)->name}} view your profile </div>
		                <div class="small-text">
		                {{$views}} {{__('footer.saw_you')}}
		                </div>
		            </div>
		        </a>
		    </li>	
		   @endif 
	    @endif
	    
    @endforeach
@endif