<table class="table align-middle table-row-dashed fs-6" id="kt_customers_table">
    <thead>
        <tr class="text-gray-400 text-start fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                </div>
            </th>
            <th class="min-w-5px">Profile</th>
            <th class="min-w-125px">Customer Name</th>
            <th class="min-w-125px">Email</th>
            <th class="min-w-125px">Job Title</th>
            <th class="min-w-120px">National ID</th>
            <th class="min-w-125px">Added On</th>
            <th class="text-end min-w-0px"></th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">

        @forelse($users as $user)
        <tr>
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1" />
                </div>
            </td>
            <td>
                @if($user->profile_photo_path == null)
                    @if($user->fname != null && $user->lname != null)
                        <span class="p-2 text-white rounded bg-primary">{{ $user->fname[0].' '.$user->lname[0] }}</span>
                    @else
                        <span class="p-2 text-white rounded bg-primary">{{ $user->name[0] }}</span>
                    @endif
                @else
                    @php
                    $photo = $user->profile_photo_path;
                        // Check if it's a full URL already
                        if ($photo && (Str::startsWith($photo, ['http://', 'https://']))) {
                            $profilePhotoUrl = $photo;
                        }
                        // If not, assume it's a local path in the storage and generate full URL
                        elseif ($photo) {
                            if (Storage::exists($photo)) {
                                $profilePhotoUrl = 'public/'.Storage::url($photo);
                            } else {
                                $profilePhotoUrl = Storage::disk('custom_public')->url(Str::replaceFirst('public/', '', $photo));
                            }
                        } else {
                            $profilePhotoUrl = 'https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg';
                        }
                    @endphp

                    <img
                        class="rounded cursor-pointer preview-image" width="35" height="35"
                        src="{{ $profilePhotoUrl }}"
                        alt="{{ $user->fname.' '.$user->lname }}"
                        data-original="{{ $profilePhotoUrl }}"
                        onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDqZLNNtpV-cNZfqbScWb3_Ny0C15rPO9mgg&s';"
                    />
                @endif
            </td>
            <td><a href="" class="mb-1 text-gray-800 text-hover-primary">{{ $user->fname.' '.$user->lname }}</a></td>
            <td>
                <a href="#" class="mb-1 text-gray-600 text-hover-primary">{{ $user->email }}</a>
            </td>
            <td>{{ $user->jobTitle ?? 'No Data' }}</td>
            <td>
                {{ $user->nrc_no ?? $user->nrc ?? 'No Data' }}
            </td>
            <td>{{ $user->created_at->toFormattedDateString() }}</td>
            <td class="text-end">
                <div class="dropdown">
                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="shadow-sm dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="{{ route('client-account', ['key'=>$user->id]) }}" class="dropdown-item">
                                <i class="fas fa-eye me-2 text-primary"></i> View
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('edit-user', ['id'=>$user->id]) }}" class="dropdown-item">
                                <i class="fas fa-edit me-2 text-success"></i> Edit
                            </a>
                        </li>
                        @can('delete clientele')
                        <li>
                            <a wire:click="destroy({{ $user->id }})"
                               onclick="confirm('Are you sure you want to permanently delete this account?') || event.stopImmediatePropagation();"
                               href="#" class="dropdown-item text-danger">
                                <i class="fas fa-trash-alt me-2"></i> Delete
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </td>
        </tr>
        @empty
        <div class="col-span-12 intro-y md:col-span-6">
            <div class="text-center box">
                <p>No User Found</p>
            </div>
        </div>
        @endforelse
    </tbody>
</table>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize image viewer for all profile images
        const images = document.querySelectorAll('.preview-image');

        images.forEach(image => {
            // Create viewer instance for each image
            const viewer = new Viewer(image, {
                inline: false,
                title: false,
                navbar: false,
                toolbar: {
                    zoomIn: true,
                    zoomOut: true,
                    oneToOne: true,
                    reset: true,
                    rotateLeft: true,
                    rotateRight: true,
                    flipHorizontal: true,
                    flipVertical: true,
                },
                viewed() {
                    viewer.zoomTo(1);
                }
            });

            // Open viewer when clicking on image
            image.addEventListener('click', function() {
                viewer.show();
            });
        });
    });
</script>