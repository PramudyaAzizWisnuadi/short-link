<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Riwayat Link Saya') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats overview maybe? Simple table for now -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-8">
                    @if($shortLinks->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b border-white/5">
                                        <th class="py-5 px-4 font-semibold text-sm text-gray-300 uppercase tracking-wider">Short Link</th>
                                        <th class="py-5 px-4 font-semibold text-sm text-gray-300 uppercase tracking-wider">Original URL</th>
                                        <th class="py-5 px-4 font-semibold text-sm text-gray-300 uppercase tracking-wider text-center">Clicks</th>
                                        <th class="py-5 px-4 font-semibold text-sm text-gray-300 uppercase tracking-wider">Created</th>
                                        <th class="py-5 px-4 font-semibold text-sm text-gray-300 uppercase tracking-wider text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shortLinks as $link)
                                        <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors">
                                            <td class="py-5 px-4">
                                                <a href="{{ url($link->short_code) }}" target="_blank" class="text-red-500 font-bold text-lg hover:underline">
                                                    {{ str_replace(['http://', 'https://'], '', url($link->short_code)) }}
                                                </a>
                                            </td>
                                            <td class="py-5 px-4">
                                                <div class="max-w-xs truncate text-sm text-gray-500" title="{{ $link->original_url }}">
                                                    {{ $link->original_url }}
                                                </div>
                                            </td>
                                            <td class="py-5 px-4 text-center">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                                    {{ $link->clicks }}
                                                </span>
                                            </td>
                                            <td class="py-5 px-4 text-sm text-gray-500">
                                                {{ $link->created_at->format('d M Y') }}
                                            </td>
                                            <td class="py-5 px-4 text-right">
                                                <button onclick="copyToClipboard('{{ url($link->short_code) }}', this)" class="text-xs font-semibold bg-white/10 hover:bg-emerald-500 transition-all text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg">
                                                    Copy
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="mb-4 inline-flex items-center justify-center w-16 h-16 bg-white/5 rounded-full">
                                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            </div>
                            <h3 class="text-xl font-medium text-white mb-2">Belum ada link</h3>
                            <p class="text-gray-500 mb-6">Anda belum membuat short link apapun.</p>
                            <a href="{{ route('home') }}" class="px-6 py-3 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold transition-all">
                                Buat Link Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text, btn) {
            const originalText = btn.innerText;
            
            function showSuccess() {
                btn.innerText = 'Tersalin!';
                btn.classList.add('bg-emerald-500');
                setTimeout(() => { 
                    btn.innerText = originalText; 
                    btn.classList.remove('bg-emerald-500');
                }, 2000);
            }

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(showSuccess).catch(err => {
                    console.error('Failed to copy: ', err);
                    fallbackCopy(text, showSuccess);
                });
            } else {
                fallbackCopy(text, showSuccess);
            }
        }

        function fallbackCopy(text, callback) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-9999px";
            textArea.style.top = "0";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                const successful = document.execCommand('copy');
                if (successful && callback) callback();
            } catch (err) {
                console.error('Fallback copy failed', err);
            }
            document.body.removeChild(textArea);
        }
    </script>
</x-app-layout>
