<?php
namespace App\Models;

abstract class Modal {
    public static $type;
    
    public static function Success(string $title, ?string $msg='', ?string $redirect=null): void {
        self::$type = "successModal";
        ?>
        <!-- Modal de Sucesso -->
        <div id='successModal' tabindex='-1' class='fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full'>
            <div class='relative w-full max-w-md max-h-full'>
                <div class='relative bg-white rounded-lg shadow'>
                    <button type='button' class='absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center' data-modal-hide='successModal'>
                        <svg class='w-3 h-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 14'>
                            <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6'/>
                        </svg>
                    </button>
                    <div class='p-6 text-center'>
                        <svg class='mx-auto mb-4 text-green-500 w-12 h-12' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'>
                            <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'/>
                        </svg>
                        <h3 class='mb-5 text-lg font-normal text-gray-500'><?= $title ?></h3>
                        <p class='mb-5 text-lg font-normal text-gray-500'><?= $msg ?></p>
                        <button onclick="Redirect('<?= $redirect ?>')" data-modal-hide='successModal' type='button' class='text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2'>
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        self::CallModal($redirect);
    }

    public static function Error(string $title, ?string $msg='', ?string $redirect=null): void {
        self::$type = "errorModal";
        ?>
        <!-- Modal de Erro -->
        <div id="errorModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="errorModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-red-500 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class='mb-5 text-lg font-normal text-gray-500'><?= $title ?></h3>
                        <p class='mb-5 text-lg font-normal text-gray-500'><?= $msg ?></p>
                        <button onclick="Redirect('<?= $redirect ?>')" data-modal-hide="errorModal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        self::CallModal($redirect);
    }

    private static function CallModal(?string $redirect=null) {
        ?>
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        <script>
            function Redirect(redirect) {
                if (redirect) {
                    window.location.href = redirect;
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('<?= self::$type ?>');
                const modalInstance = new Modal(modal);
                modalInstance.show();
            });
        </script>
        <?php
    }
}