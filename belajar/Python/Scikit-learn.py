import numpy as np
import pandas as pd
import sklearn.linear_model import LinearRegression

# Contoh dataset sederhana
X = np.array([1, 2, 3, 4, 5,]).reshape(-1, 1)
y = np.array([2, 4, 6, 8, 10,])

# Membuat model regresi linear
model = LinearRegression()
model.fit(X,y)

# Prediksi nilai baru
y_pred = moddel.predict(X)

# Visualisasi hasil
plt.scatter(X, y, color="blue", label="Data Asli")
plt.plot(X, y_pred, color="red", label="Regresi Linear")
plt.legend()
plt.show()