<?= $this->include('layouts/header') ?>



<!-- if userdata['logged_id'] nya ada maka tampilkan data user yang disimpan dalam session -->
<div class="relative bg-yellow-50 overflow-hidden">
    <?= $this->include('partials/topbar') ?>
    <?= $this->include('partials/aside') ?>



    <main class="lg:ml-60 ml-0 pt-16">
        <div class="px-6 py-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl p-8 mb-5">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div id="toast-success" class="flex items-center w-full w-full mt-3 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal"><?= session()->getFlashdata('success') ?></div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div id="toast-danger" class="flex items-center w-full w-full mt-3 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                </svg>
                                <span class="sr-only">Error icon</span>
                            </div>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <div class="ms-3 text-sm font-normal">
                                    <?= esc($error) ?>
                                </div>
                            <?php endforeach; ?>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>
                    <h1 class="text-sm font-bold text-black mb-5">Data Paket Membership
                        <?php if (count($memberships) > 0) : ?>
                            (<span class="text-blue-500"><?= count($memberships) ?></span>)
                        <?php else : ?>
                            (<span class="text-blue-500">0</span>)
                        <?php endif; ?> <span class="block text-sm font-normal">Kelola paket membership yang ditawarkan<span class="text-yellow-500 font-bold"><?= $configs['nama_aplikasi'] ?></span> App.</span></h1>


                    <?php if (count($memberships) < 3) : ?>
                        <div class="flex justify-end items-center w-full">
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                Tambahkan Paket
                            </button>
                        </div>
                    <?php endif; ?>



                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Jangka Waktu
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Biaya Bulanan
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Biaya Total
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Keunggulan
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1;
                                foreach ($memberships as $paket) : ?>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            <button type="button" data-modal-target="edit<?= $paket['id'] ?>" data-modal-toggle="edit<?= $paket['id'] ?>" class="text-blue-700 hover:text-pink-500"><?= $paket['jangka_waktu'] ?> Bulan <i class="fa fa-pencil"></i></button>
                                        </th>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            Rp.<?= $paket['biaya_bulanan'] ?>/bln
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            Rp.<?= $paket['biaya_total'] ?>
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            <?php if ($paket['keunggulan']) : ?>
                                                Gratis <span class="text-blue-500 font-medium"><?= $paket['keunggulan'] ?></span> Sesi personal training
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="/pricing/delete/<?= $paket['id'] ?>" onclick="return confirm('Are you sure you want to delete this plan?');" class="bg-red-500 font-medium py-2 px-3 rounded-md text-white"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div id="edit<?= $paket['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Edit <i class="fa fa-pencil"></i>
                                                    </h3>
                                                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit<?= $paket['id'] ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form action="/pricing/update/<?= $paket['id'] ?>" method="post">
                                                    <div class="p-4 md:p-5">
                                                        <div class="mb-5">
                                                            <label for="jangka_waktu<?= $paket['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jangka waktu (bulan)</label>
                                                            <input type="number" min="1" id="jangka_waktu<?= $paket['id'] ?>" name="jangka_waktu" value="<?= $paket['jangka_waktu'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="biaya_bulanan<?= $paket['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya Bulanan</label>
                                                            <input type="text" id="biaya_bulanan<?= $paket['id'] ?>" name="biaya_bulanan" value="<?= $paket['biaya_bulanan'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="biaya_total<?= $paket['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya Total</label>
                                                            <input type="text" id="biaya_total<?= $paket['id'] ?>" name="biaya_total" value="<?= $paket['biaya_total'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="keunggulan<?= $paket['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keunggulan</label>
                                                            <input type="number" min="0" id="keunggulan<?= $paket['id'] ?>" name="keunggulan" value="<?= $paket['keunggulan'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>


                                                        <button type="submit" class="w-full block text-center text-sm font-bold text-white mb-5 <?= ($index % 2 == 0) ? 'bg-yellow-300' : 'bg-pink-500' ?> py-4 rounded-md mb-2">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php $index++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>




                </div>
            </div>
        </div>
    </main>
</div>



<!-- tambah data mitra -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Buat
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="/pricing/add" method="post">

                    <div>
                        <label for="jangka_waktu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jangka Waktu (Bulan)</label>
                        <input type="number" name="jangka_waktu" id="jangka_waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="biaya_bulanan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya Bulanan</label>
                        <input type="text" name="biaya_bulanan" id="biaya_bulanan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="biaya_total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya Total</label>
                        <input type="text" name="biaya_total" id="biaya_total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="keunggulan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keunggulan</label>
                        <input type="number" min="0" name="keunggulan" id="keunggulan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>



                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>

                </form>
            </div>
        </div>
    </div>
</div>




<?= $this->include('layouts/footer') ?>