FOR /F "tokens=1,2 delims==" %%G IN (doc.properties) DO (set %%G=%%H)  
copy data.xml dist\rapla-binary-%doc.version%\data\