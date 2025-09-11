<table>
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Status Perkawinan</th>
            <th>Pekerjaan</th>
            <th>Pendidikan Terakhir</th>
            <th>Alamat</th>
            <th>RT</th>
            <th>RW</th>
            <th>Desa</th>
            <th>Memiliki KTP</th>
            <th>Tanggal Rekam KTP</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>3201234567890123</td>
            <td>Nama Contoh</td>
            <td>Laki-laki</td>
            <td>Jakarta</td>
            <td>01/01/1990</td>
            <td>Islam</td>
            <td>Belum Kawin</td>
            <td>Wiraswasta</td>
            <td>SMA</td>
            <td>Jl. Contoh No. 123</td>
            <td>001</td>
            <td>002</td>
            <td>{{ $desa->nama_desa }}</td>
            <td>Ya</td>
            <td>01/01/2020</td>
        </tr>
        <tr>
            <td>3201234567890124</td>
            <td>Nama Contoh 2</td>
            <td>Perempuan</td>
            <td>Bandung</td>
            <td>02/02/1992</td>
            <td>Kristen</td>
            <td>Kawin</td>
            <td>Karyawan Swasta</td>
            <td>S1</td>
            <td>Jl. Contoh No. 124</td>
            <td>001</td>
            <td>002</td>
            <td>{{ $desa->nama_desa }}</td>
            <td>Ya</td>
            <td>02/02/2020</td>
        </tr>
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th colspan="15">Petunjuk Pengisian</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="15">1. NIK harus 16 digit angka</td>
        </tr>
        <tr>
            <td colspan="15">2. Jenis Kelamin harus diisi dengan "Laki-laki" atau "Perempuan"</td>
        </tr>
        <tr>
            <td colspan="15">3. Tanggal Lahir harus dalam format DD/MM/YYYY (contoh: 01/01/1990)</td>
        </tr>
        <tr>
            <td colspan="15">4. Agama harus diisi dengan salah satu dari: Islam, Kristen, Katolik, Hindu, Buddha, Konghucu</td>
        </tr>
        <tr>
            <td colspan="15">5. Status Perkawinan harus diisi dengan salah satu dari: Belum Kawin, Kawin, Cerai Hidup, Cerai Mati</td>
        </tr>
        <tr>
            <td colspan="15">6. Pendidikan Terakhir harus diisi dengan salah satu dari: Tidak Sekolah, SD, SMP, SMA, D3, S1, S2, S3</td>
        </tr>
        <tr>
            <td colspan="15">7. RT dan RW harus diisi dengan angka atau kombinasi angka dan huruf</td>
        </tr>
        <tr>
            <td colspan="15">8. Desa harus diisi dengan nama desa yang terdaftar di sistem</td>
        </tr>
        <tr>
            <td colspan="15">9. Memiliki KTP harus diisi dengan "Ya" atau "Tidak"</td>
        </tr>
        <tr>
            <td colspan="15">10. Tanggal Rekam KTP harus dalam format DD/MM/YYYY dan wajib diisi jika Memiliki KTP = "Ya"</td>
        </tr>
    </tbody>
</table>