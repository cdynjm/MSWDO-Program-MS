{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"><img src="{{ asset('storage/users-avatar/avatar.png') }}" alt=""></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Shared Photos</span></p>
    <div class="shared-photos-list"></div>
</div>
