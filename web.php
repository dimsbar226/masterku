<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rangkuman Materi- Persistent File Storage</title>
  <style>
    /* ... [same styling as previous elegant dark design] ... */
    @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap');

    * {
      box-sizing: border-box;
    }

    body {
       margin: 0;
      padding: 0;
      background-image: url('mp.png'); /* Ganti dengan nama file gambarmu */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      font-family: Arial, sans-serif;
      color: white;
    }
    header {
      background: #2a4e22;
      padding: 1.75rem 2rem;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
      text-align: center;
    }
    header h1 {
      margin: 0;
      font-size: 2.4rem;
      font-weight: 700;
      color: #bbb;
      letter-spacing: 0.12em;
    }

    main {
      max-width: 1100px;
      margin: 2rem auto 3rem;
      width: 92%;
      display: grid;
      grid-template-columns: 370px 1fr;
      gap: 2.5rem;
    }

    .form-container {
      background: #2a4e22;
      border-radius: 14px;
      padding: 2.2rem 2.5rem;
      box-shadow:
        0 0 18px rgba(0, 0, 0, 0.7),
        inset 0 0 15px #2a4e22;
      display: flex;
      flex-direction: column;
    }

    .form-container h2 {
      font-size: 1.75rem;
      font-weight: 700;
      margin: 0 0 1.8rem 0;
      text-align: center;
      color: #ddd;
      letter-spacing: 0.1em;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
    }

    label {
      font-weight: 700;
      color: #ccc;
      user-select: none;
    }

    input[type="text"],
    input[type="file"] {
      background: #262626;
      border: 2.5px solid #444;
      border-radius: 12px;
      font-size: 1.1rem;
      padding: 0.7rem 1rem;
      color: #eee;
      box-shadow:
        inset 0 0 6px #333;
      font-family: 'Rajdhani', sans-serif;
      transition: border-color 0.3s ease, box-shadow 0.4s ease;
      cursor: text;
    }
    input[type="text"]:focus, input[type="file"]:focus {
      outline: none;
      border-color: #999;
      box-shadow:
        inset 0 0 12px #999;
      background: #333;
    }

    button {
      margin-top: 0.5rem;
      padding: 0.75rem 1.7rem;
      font-weight: 700;
      font-size: 1.1rem;
      border-radius: 14px;
      border: none;
      background-color: #444;
      color: #ddd;
      cursor: pointer;
      box-shadow:
        0 0 12px #555;
      text-transform: uppercase;
      letter-spacing: 0.14em;
      transition: background-color 0.3s ease, box-shadow 0.4s ease;
    }
    button:hover, button:focus {
      background-color: #666;
      box-shadow:
        0 0 20px #777;
      outline: none;
    }

    .materials-container {
      background: #2a4e22;
      border-radius: 14px;
      padding: 2rem 2.5rem;
      box-shadow:
        0 0 25px rgba(0,0,0,0.8),
        inset 0 0 30px #2c2c2c;
      display: flex;
      flex-direction: column;
    }
    .materials-container h2 {
      font-weight: 700;
      font-size: 2rem;
      margin: 0 0 1.8rem 0;
      color: #ddd;
      text-align: center;
      letter-spacing: 0.12em;
    }

    .material-item {
      background: #262626;
      border-radius: 16px;
      padding: 1.8rem 2.3rem;
      margin-bottom: 1.5rem;
      position: relative;
      display: flex;
      flex-direction: column;
      transition: box-shadow 0.3s ease;
      box-shadow: 0 0 20px #444b;
    }
    .material-item:hover {
      box-shadow: 0 0 32px #555e;
    }

    .material-title {
      font-weight: 900;
      font-size: 1.7rem;
      color: #eee;
      margin: 0 0 1rem 0;
      user-select: text;
    }

    .file-viewer {
      border-radius: 16px;
      overflow: hidden;
      max-height: 380px;
      margin-top: 0.9rem;
      box-shadow:
        0 0 26px rgba(100,100,100,0.5);
      border: 2px solid #444;
    }
    iframe.file-pdf, iframe.file-other {
      width: 100%;
      height: 380px;
      border: none;
      border-radius: 16px;
    }
    img.file-image {
      max-width: 100%;
      height: auto;
      border-radius: 16px;
      margin-top: 0.8rem;
      box-shadow: 0 0 18px rgba(100, 100, 100, 0.6);
    }
    video.file-video {
      width: 100%;
      max-height: 370px;
      border-radius: 16px;
      background-color: black;
      margin-top: 0.8rem;
      box-shadow: 0 0 28px rgba(100, 100, 100, 0.7);
    }
    audio.file-audio {
      margin-top: 0.9rem;
      width: 100%;
      outline: none;
      border-radius: 16px;
    }

    .download-link {
      margin-top: 0.85rem;
      color: #ccc;
      font-weight: 700;
      font-size: 1rem;
      text-decoration: underline;
      cursor: pointer;
      user-select: text;
      transition: color 0.3s ease;
    }
    .download-link:hover {
      color: #eee;
    }

    .btn-delete {
      position: absolute;
      top: 18px;
      right: 25px;
      background: #2a4e22;
      border: none;
      border-radius: 10px;
      padding: 0.4rem 1rem;
      font-weight: 800;
      font-size: 1rem;
      color: #fff;
      cursor: pointer;
      box-shadow:
        0 0 14px #2a4e22;
      transition: background-color 0.3s ease, box-shadow 0.4s ease;
    }
    .btn-delete:hover {
      background-color:rgb(51, 123, 35);
      box-shadow: 0 0 20pxrgb(52, 129, 35);
    }

    @media (max-width: 960px) {
      main {
        grid-template-columns: 1fr !important;
        padding: 0 1rem 3rem;
      }
      .form-container {
        margin-right: 0;
        margin-bottom: 2.5rem;
      }
    }
  </style>
</head>
<body>
<header>
  <h1>Rangkuman Materi</h1>
</header>
<main>
  <section class="form-container" aria-label="Form tambah materi">
    <h2>Tambah Materi Baru</h2>
    <form id="materialForm" autocomplete="off" novalidate>
      <label for="title">Judul Materi</label>
      <input type="text" id="title" name="title" placeholder="Judul materi pelajaran" required aria-required="true" autocomplete="off" />
      <label for="file">Upload File (opsional)</label>
      <input type="file" id="file" name="file" aria-describedby="fileHelp" />
      <small id="fileHelp" style="color:#bbb; font-size:0.85rem; margin-top: -0.6rem; margin-bottom: 0.8rem;">File akan langsung ditampilkan jika didukung, atau link download akan disediakan.</small>
      <button type="submit" aria-label="Tambah materi">Tambah Materi</button>
    </form>
  </section>

  <section class="materials-container" aria-label="Daftar materi semester">
    <h2>Daftar Materi</h2>
    <div id="materialsList" tabindex="0" aria-live="polite" aria-atomic="true"></div>
  </section>
</main>
<script>
  const DB_NAME = 'semester-materials-db';
  const DB_VERSION = 1;
  const STORE_NAME = 'files';

  let db;

  function openDB() {
    return new Promise((resolve, reject) => {
      if (db) return resolve(db);
      const request = indexedDB.open(DB_NAME, DB_VERSION);
      request.onerror = () => reject(request.error);
      request.onsuccess = () => {
        db = request.result;
        resolve(db);
      };
      request.onupgradeneeded = e => {
        db = e.target.result;
        if (!db.objectStoreNames.contains(STORE_NAME)) {
          db.createObjectStore(STORE_NAME, { keyPath: 'id', autoIncrement: true });
        }
      };
    });
  }

  function saveFileToDB(file) {
    return new Promise(async (resolve, reject) => {
      try {
        const db = await openDB();
        const tx = db.transaction(STORE_NAME, 'readwrite');
        const store = tx.objectStore(STORE_NAME);
        const fileRecord = { file: file, name: file.name, type: file.type };
        const request = store.add(fileRecord);
        request.onsuccess = () => resolve(request.result);
        request.onerror = () => reject(request.error);
      } catch (err) {
        reject(err);
      }
    });
  }

  function getFileFromDB(id) {
    return new Promise(async (resolve, reject) => {
      try {
        const db = await openDB();
        const tx = db.transaction(STORE_NAME, 'readonly');
        const store = tx.objectStore(STORE_NAME);
        const request = store.get(id);
        request.onsuccess = () => resolve(request.result ? request.result.file : null);
        request.onerror = () => reject(request.error);
      } catch (err) {
        reject(err);
      }
    });
  }

  function deleteFileFromDB(id) {
    return new Promise(async (resolve, reject) => {
      try {
        const db = await openDB();
        const tx = db.transaction(STORE_NAME, 'readwrite');
        const store = tx.objectStore(STORE_NAME);
        const request = store.delete(id);
        request.onsuccess = () => resolve();
        request.onerror = () => reject(request.error);
      } catch (err) {
        reject(err);
      }
    });
  }

  const form = document.getElementById('materialForm');
  const materialsList = document.getElementById('materialsList');

  // materials: array of objects { title, fileId, fileName, fileType, blobURL (runtime) }
  let materials = JSON.parse(localStorage.getItem('semesterMaterials')) || [];

  async function loadMaterialsWithFiles() {
    await openDB();
    for (const mat of materials) {
      if (mat.fileId) {
        const file = await getFileFromDB(mat.fileId);
        if (file) {
          mat.blobURL = URL.createObjectURL(file);
          mat.fileType = file.type;
          mat.fileName = file.name;
        } else {
          mat.blobURL = null;
          mat.fileType = '';
        }
      }
    }
  }

  function createMaterialElement(material, index) {
    const container = document.createElement('article');
    container.classList.add('material-item');
    container.setAttribute('tabindex', '-1');
    container.setAttribute('aria-label', `Materi judul ${material.title}`);

    const titleEl = document.createElement('h3');
    titleEl.className = 'material-title';
    titleEl.textContent = material.title;
    container.appendChild(titleEl);

    if (material.blobURL && material.fileType) {
      if (material.fileType.startsWith('image/')) {
        const img = document.createElement('img');
        img.className = 'file-image';
        img.src = material.blobURL;
        img.alt = `Preview gambar materi: ${material.title}`;
        container.appendChild(img);
      } else if (material.fileType.startsWith('video/')) {
        const video = document.createElement('video');
        video.className = 'file-video';
        video.controls = true;
        video.src = material.blobURL;
        video.setAttribute('aria-label', `Video materi ${material.title}`);
        container.appendChild(video);
      } else if (material.fileType.startsWith('audio/')) {
        const audio = document.createElement('audio');
        audio.className = 'file-audio';
        audio.controls = true;
        audio.src = material.blobURL;
        audio.setAttribute('aria-label', `Audio materi ${material.title}`);
        container.appendChild(audio);
      } else if (material.fileType === 'application/pdf') {
        const pdfWrapper = document.createElement('div');
        pdfWrapper.className = 'file-viewer';
        const iframe = document.createElement('iframe');
        iframe.className = 'file-pdf';
        iframe.src = material.blobURL;
        iframe.title = `Preview PDF: ${material.fileName || 'file'}`;
        pdfWrapper.appendChild(iframe);
        container.appendChild(pdfWrapper);
      } else {
        const downloadLink = document.createElement('a');
        downloadLink.className = 'download-link';
        downloadLink.href = material.blobURL;
        downloadLink.download = material.fileName || 'file';
        downloadLink.textContent = `Download: ${material.fileName || 'File'}`;
        downloadLink.target = '_blank';
        downloadLink.rel = 'noopener noreferrer';
        container.appendChild(downloadLink);
      }
    }

    const delBtn = document.createElement('button');
    delBtn.className = 'btn-delete';
    delBtn.title = 'Hapus materi ini';
    delBtn.setAttribute('aria-label', `Hapus materi ${material.title}`);
    delBtn.innerText = 'Hapus';
    delBtn.addEventListener('click', async () => {
      if (confirm(`Yakin ingin menghapus materi "${material.title}"?`)) {
        if (material.blobURL) URL.revokeObjectURL(material.blobURL);
        if (material.fileId) await deleteFileFromDB(material.fileId);
        materials.splice(index, 1);
        saveMaterials();
        await loadMaterialsWithFiles();
        renderMaterials();
      }
    });
    container.appendChild(delBtn);

    return container;
  }

  function renderMaterials() {
    materialsList.innerHTML = '';
    if (materials.length === 0) {
      const info = document.createElement('p');
      info.textContent = 'Belum ada materi yang dimasukkan.';
      info.style.textAlign = 'center';
      info.style.fontStyle = 'italic';
      info.style.color = '#aaa';
      info.setAttribute('tabindex', '0');
      materialsList.appendChild(info);
      return;
    }
    materials.forEach((mat, idx) => {
      const el = createMaterialElement(mat, idx);
      materialsList.appendChild(el);
    });
  }

  function saveMaterials() {
    // We store all metadata except the blobURL
    const saveable = materials.map(({title, fileId, fileName, fileType}) => ({title, fileId, fileName, fileType}));
    localStorage.setItem('semesterMaterials', JSON.stringify(saveable));
  }

  form.addEventListener('submit', async e => {
    e.preventDefault();

    const title = form.title.value.trim();

    if (!title) {
      alert('Mohon isi judul materi.');
      return;
    }

    const fileInput = form.file;

    let fileId = null;
    let fileType = '';
    let fileName = '';

    if(fileInput && fileInput.files.length > 0){
      const file = fileInput.files[0];
      fileType = file.type;
      fileName = file.name;
      try {
        fileId = await saveFileToDB(file);
      } catch (err) {
        alert('Gagal menyimpan file. Silakan coba lagi.');
        return;
      }
    }

    const newMaterial = {
      title,
      fileId,
      fileName,
      fileType
    };

    materials.push(newMaterial);
    saveMaterials();
    await loadMaterialsWithFiles();
    renderMaterials();

    form.reset();
    form.title.focus();

    setTimeout(() => {
      const lastMaterial = materialsList.lastChild;
      if(lastMaterial) {
        lastMaterial.focus();
      }
    },150);
  });

  async function initialize(){
    await openDB();
    await loadMaterialsWithFiles();
    renderMaterials();
  }

  initialize();
</script>
</body>
</html>
