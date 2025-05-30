import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt

# Contoh data sintetis (gantilah dengan data asli Anda)
# Misalnya, kolom "kebiasaan_koruptif" adalah skor rata-rata
# perilaku menunda, meminta toleransi, dan jalan pintas.
# Kolom "kinerja_akademik" adalah skor persepsi kinerja atau nilai akademik.
data = {
    'kebiasaan_koruptif': [4, 3, 5, 2, 1, 4, 4, 3, 2, 5, 2, 1, 4, 3, 5, 4, 2, 3, 4, 5, 2, 1, 4, 3],
    'kinerja_akademik':   [2, 3, 1, 4, 5, 2, 2, 3, 4, 1, 4, 5, 2, 3, 1, 2, 4, 3, 2, 1, 4, 5, 2, 3]
}

# Membuat DataFrame
df = pd.DataFrame(data)

# --- 1. Melihat sekilas data ---
print("Data Awal:\n", df.head(), "\n")

# --- 2. Menghitung korelasi Pearson ---
# df.corr() default-nya menggunakan Pearson, namun kita bisa menegaskannya:
corr_matrix = df.corr(method='pearson')
print("Matriks Korelasi (Pearson):\n", corr_matrix, "\n")

# --- 3. Visualisasi Korelasi dalam Bentuk Heatmap ---
plt.figure(figsize=(5,4))
sns.heatmap(corr_matrix, annot=True, cmap='coolwarm', vmin=-1, vmax=1)
plt.title("Heatmap Korelasi Pearson")
plt.show()

# --- 4. Visualisasi Scatter Plot dengan Regresi ---
plt.figure(figsize=(5,4))
sns.regplot(x='kebiasaan_koruptif', y='kinerja_akademik', data=df, ci=None)
plt.title("Scatter Plot: Kebiasaan Koruptif vs Kinerja Akademik")
plt.xlabel("Skor Kebiasaan Koruptif")
plt.ylabel("Skor Kinerja Akademik")
plt.show()
