<!-- Tailwind CSS CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

<style>
    :root {
        --primary: #6a3093;
        --secondary: #a044ff;
    }

    .bg-primary {
        background-color: var(--primary);
    }

    .text-primary {
        color: var(--primary);
    }

    .bg-gradient-purple {
        background: linear-gradient(135deg, #6a3093, #a044ff);
    }

    .profile-transition {
        transition: all 0.3s ease;
    }

    .profile-card:hover {
        transform: translateY(-3px);
    }
</style>

<div class="w-full bg-gray-50">
    <div class="container px-4 py-6 mx-auto">
        <div class="flex flex-col gap-6 lg:flex-row">
            <!-- Profile Card -->
            <div class="w-full overflow-hidden bg-white shadow-md profile-card lg:w-1/3 rounded-2xl profile-transition">
                <!-- Profile Photo Section -->
                <div class="flex items-center justify-center p-8 bg-gradient-purple">
                    <div class="flex items-center justify-center overflow-hidden bg-white border-4 border-white rounded-full w-36 h-36 bg-opacity-20 border-opacity-30">
                        @if($data->profile_photo_path == null)
                            @if($data->fname != null && $data->lname != null)
                                <span class="text-4xl font-bold text-white">{{ $data->fname[0].' '.$data->lname[0] }}</span>
                            @else
                                <span class="text-4xl font-bold text-white">{{ $data->name[0] }}</span>
                            @endif
                        @else
                            <img src="{{ 'public/'.Storage::url($data->profile_photo_path) }}" alt="Profile Photo" class="object-cover w-full h-full" />
                        @endif
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="p-6 border-b border-gray-100">
                    <h2 class="mb-1 text-2xl font-semibold text-primary">
                        @if($data->fname != null && $data->lname != null)
                            {{ $data->fname.' '.$data->lname }}
                        @else
                            {{ $data->name }}
                        @endif
                    </h2>
                    <p class="text-gray-500">{{ $data->occupation ?? 'Member' }}</p>
                </div>

                <!-- Profile Stats -->
                <div class="grid grid-cols-2 gap-4 p-6">
                    <div class="text-center">
                        <div class="text-xl font-semibold text-primary">{{ $data->created_at->diffForHumans(null, true) }}</div>
                        <div class="mt-1 text-xs tracking-wider text-gray-500 uppercase">Member For</div>
                    </div>
                    <div class="text-center">
                        <div class="text-xl font-semibold text-primary">{{ $data->deprtment ?? 'N/A' }}</div>
                        <div class="mt-1 text-xs tracking-wider text-gray-500 uppercase">Department</div>
                    </div>
                </div>
            </div>

            <!-- Information Card -->
            <div class="w-full overflow-hidden bg-white shadow-md profile-card lg:w-2/3 rounded-2xl profile-transition">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <h3 class="text-xl font-semibold text-primary">Information</h3>
                    <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-2 space-x-2 text-white transition-opacity rounded-lg btnclicky bg-gradient-purple hover:opacity-90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                        <span>Edit</span>
                    </a>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div class="flex flex-col">
                            <span class="mb-1 text-xs font-semibold tracking-wider text-gray-500 uppercase">USER ID</span>
                            <span class="font-medium text-gray-800">{{ $data->id }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="mb-1 text-xs font-semibold tracking-wider text-gray-500 uppercase">EMAIL ADDRESS</span>
                            <span class="font-medium text-gray-800">{{ $data->email }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="mb-1 text-xs font-semibold tracking-wider text-gray-500 uppercase">RESIDENTIAL ADDRESS</span>
                            <span class="font-medium text-gray-800">{{ $data->address ?? 'No Address' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="mb-1 text-xs font-semibold tracking-wider text-gray-500 uppercase">JOINED SINCE</span>
                            <span class="font-medium text-gray-800">{{ $data->created_at->toFormattedDateString() }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="mb-1 text-xs font-semibold tracking-wider text-gray-500 uppercase">DEPARTMENT</span>
                            <span class="font-medium text-gray-800">{{ $data->deprtment ?? 'Not set' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="mb-1 text-xs font-semibold tracking-wider text-gray-500 uppercase">OCCUPATION</span>
                            <span class="font-medium text-gray-800">{{ $data->occupation ?? 'Not set' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
