import React, { useState } from 'react';

export default function KatalogBarang({ daftarBarang }) {
  const [keyword, setKeyword] = useState('');
  const [kategori, setKategori] = useState('Semua');

  // Filter otomatis setiap kali state keyword atau kategori berubah (Kriteria 3)
  const hasilFilter = daftarBarang.filter((barang) => {
    const cocokNama = barang.nama.toLowerCase().includes(keyword.toLowerCase());
    const cocokKategori = kategori === 'Semua' || barang.kategori === kategori;
    return cocokNama && cocokKategori;
  });

  return (
    <div>
      {/* Input Pencarian & Kategori */}
      <div className="search-bar">
        <input
          type="text"
          placeholder="Cari nama barang..."
          value={keyword}
          onChange={(e) => setKeyword(e.target.value)}
        />
        <select value={kategori} onChange={(e) => setKategori(e.target.value)}>
          <option value="Semua">Semua Kategori</option>
          <option value="Alat Elektronik">Alat Elektronik</option>
          <option value="Alat Tulis">Alat Tulis</option>
        </select>
      </div>

      {/* Daftar Hasil atau Pesan Kosong (Kriteria 4) */}
      {hasilFilter.length > 0 ? (
        <div className="grid-katalog">
          {hasilFilter.map((item) => (
            <div key={item.id} className="card">
              <h3>{item.nama}</h3>
              <p>Kategori: {item.kategori}</p>
            </div>
          ))}
        </div>
      ) : (
        <div className="empty-state">
          <p>Barang yang dicari tidak ditemukan. Coba kata kunci atau kategori lain.</p>
        </div>
      )}
    </div>
  );
}