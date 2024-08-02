<div class="content-body mh-auto" style="min-height: 828px;">
    <div class="container-fluid p-sm-0">
        <!-- row -->
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <div class="card rounded-0 mb-0 h-auto">
                    <div class="card-body p-0 ">
                        <div class="row gx-0">
                            <!--column-->
                            <div class="col-lg-3 col-xl-2 col-xxl-3">
                                <div class="email-left-box dz-scroll pt-4" id="email-left">
                                    <div class="p-0">
                                        <h3>Send Notification Messages</h3>
                                    </div>
                                    <div class="mail-list rounded ">
                                        <a href="email-inbox.html" class="list-group-item active">
                                            <i class="fa-regular fa-envelope align-middle"></i>
                                            Payment overdue remainder
                                        </a>
                                        {{-- <a href="email-inbox.html" class="list-group-item active"><i class="fa-regular fa-envelope align-middle"></i>Inbox <span class="badge badge-purple badge-sm float-end rounded">2</span> </a> --}}
                                    </div>
                                </div>
                            </div>
                            <!--/column-->
                            <div class="col-lg-9 col-xl-10 col-xxl-9">
                                <div class="email-right-box ms-0 p-4">
                                    <div class="px-3 mt-6" role="toolbar">

                                        <div class="p-3 mt-8">
                                            <h4>Send Emails Messages</h4>
                                        </div>
                                    </div>
                                    <div class="compose-wrapper " id="compose-content">
                                        <div class="compose-content">
                                            <form wire:submit.prevent='sendMessage()'>
                                                <div wire:ignore class="mb-3">
                                                    <select wire:model.defer="to" wire:ignore multiple class="default-select uppercase form-control wide mb-3" id="exampleInputEmail7" placeholder="Find Customer" data-live-search="true">
                                                        {{-- <option>To: </option> --}}
                                                        @forelse ($users as $user)
                                                        <option value="{{ $user->id }}">
                                                            <span>{{ $user->fname.' '.$user->lname }}</span>
                                                            </br>
                                                            <small>{{ $user->email }}</small>
                                                        </option>
                                                        @empty
                                                        <option>No Customers Yet</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" wire:model.defer="subject" class="form-control bg-transparent" placeholder=" Subject:">
                                                </div>
                                                <div class="mb-3">
                                                    <textarea id="email-compose-editor" wire:model.defer="message" class="textarea_editor form-control bg-transparent" rows="5" placeholder="Write a Message"></textarea>
                                                </div>
                                                
                                                <div>
                                                    @include('livewire.dashboard.__parts.dash-alerts')
                                                </div>
                                                <div class="text-start mt-4 mb-3">
                                                    <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Send</button>
                                                    <button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i class="fa fa-times"></i></span>Discard</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>