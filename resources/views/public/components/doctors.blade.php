<section id="doctors" class="relative overflow-hidden bg-white py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-12">

        {{-- Heading --}}
        <div class="mb-14 text-center">
            <p class="text-sm font-medium uppercase tracking-[0.25em] text-neutral-500">
                Our Doctors
            </p>

            <h2 class="mt-3 text-4xl font-bold tracking-tight text-neutral-900 lg:text-5xl">
                Meet Our Doctors
            </h2>
        </div>

        @if ($homeDoctors->isNotEmpty())

            @php
                $doctorChunks = $homeDoctors->chunk(3);
            @endphp

            <div data-doctor-slider class="relative">

                {{-- Slides --}}
                <div class="relative">
                    @foreach ($doctorChunks as $chunkIndex => $chunk)

                        <div
                            data-doctor-slide
                            class="{{ $chunkIndex === 0 ? '' : 'hidden' }}"
                        >
                            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

                                @foreach ($chunk as $item)

                                    @php
                                        $doctor = $item->doctor;
                                    @endphp

                                    @if ($doctor)

                                        <a
                                            href="{{ route('doctor.show', $doctor->slug) }}"
                                            class="group block"
                                        >
                                            <div class="overflow-hidden rounded-[2rem] bg-neutral-100">

                                                @if ($doctor->photo)
                                                    <img
                                                        src="{{ asset('storage/' . $doctor->photo) }}"
                                                        alt="{{ $doctor->name }}"
                                                        class="aspect-[4/5] w-full object-cover transition duration-700 ease-out group-hover:scale-105"
                                                    >
                                                @else
                                                    <div class="flex aspect-[4/5] items-center justify-center text-sm text-neutral-400">
                                                        No photo
                                                    </div>
                                                @endif

                                            </div>

                                            <div class="pt-5 text-center">

                                                @if ($doctor->specialization)
                                                    <p class="text-sm uppercase tracking-[0.18em] text-neutral-400">
                                                        {{ $doctor->specialization }}
                                                    </p>
                                                @endif

                                                <h3 class="mt-2 text-xl font-semibold text-neutral-900">
                                                    {{ $doctor->title }}
                                                    {{ $doctor->name }}
                                                </h3>

                                                <span class="mt-4 inline-flex text-sm font-medium text-neutral-500 transition group-hover:text-[#FF5252]">
                                                    View Profile →
                                                </span>

                                            </div>
                                        </a>

                                    @endif

                                @endforeach

                            </div>
                        </div>

                    @endforeach
                </div>

                {{-- Navigation --}}
                @if ($doctorChunks->count() > 1)

                    <div class="mt-12 flex items-center justify-center gap-6">

                        {{-- Previous --}}
                        <button
                            type="button"
                            data-doctor-prev
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-neutral-200 text-neutral-600 transition hover:border-[#FF5252] hover:bg-[#FF5252] hover:text-white"
                            aria-label="Previous doctors"
                        >
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 19l-7-7 7-7"
                                />
                            </svg>
                        </button>

                        {{-- Dots --}}
                        <div class="flex items-center gap-2">

                            @foreach ($doctorChunks as $index => $chunk)

                                <button
                                    type="button"
                                    data-doctor-dot="{{ $index }}"
                                    class="{{ $index === 0
                                        ? 'w-8 bg-[#FF5252]'
                                        : 'w-2 bg-neutral-300' }}
                                        h-2 rounded-full transition-all duration-300"
                                    aria-label="Go to doctor slide {{ $index + 1 }}"
                                ></button>

                            @endforeach

                        </div>

                        {{-- Next --}}
                        <button
                            type="button"
                            data-doctor-next
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-neutral-200 text-neutral-600 transition hover:border-[#FF5252] hover:bg-[#FF5252] hover:text-white"
                            aria-label="Next doctors"
                        >
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </button>

                    </div>

                @endif

            </div>

        @else

            <p class="py-12 text-center text-neutral-500">
                No doctors available.
            </p>

        @endif

    </div>
</section>