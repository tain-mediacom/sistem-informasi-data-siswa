<?php include_once "templates/header.php"; ?>
    <div class="flex h-screen">
        <!-- sidebar -->
        <?php include_once "templates/sidebar.php"; ?>
        <!-- sidebar end -->

        <!-- main content -->
        <div class="content px-6 py-2">
            <h1 class="text-xl font-semibold">Data Siswa</h1>

            <table class="mt-4">
                <thead>
                    <tr>
                        <th class="border border-cyan-200 bg-blue-900 text-white py-1 px-3">No</th>
                        <th class="border border-cyan-200 bg-blue-900 text-white py-1 px-3">Nama Siswa</th>
                        <th class="border border-cyan-200 bg-blue-900 text-white py-1 px-3">NISN</th>
                        <th class="border border-cyan-200 bg-blue-900 text-white py-1 px-3">Jurusan</th>
                        <th class="border border-cyan-200 bg-blue-900 text-white py-1 px-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-cyan-200 text-slate-700 py-1 px-3">1</td>
                        <td class="border border-cyan-200 text-slate-700 py-1 px-3">Jhon</td>
                        <td class="border border-cyan-200 text-slate-700 py-1 px-3">1234567</td>
                        <td class="border border-cyan-200 text-slate-700 py-1 px-3">rpl</td>
                        <td class="border flex items-center gap-2 border-cyan-200 text-slate-700 py-1 px-3">
                            <form action="">
                                <button class="bg-red text-white py-0.5 px-2 rounded-md border border-red-300 bg-red-700">Hapus</button>
                            </form>
                            <a href="" class="bg-blue-700 py-0.5 px-4 rounded-md border border-cyan-300 block text-white">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- main content end -->
    </div>
<?php include_once "templates/footer.php"; ?>