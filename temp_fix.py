from pathlib import Path
import re
p = Path("temp_beautiful_search.php")
text = p.read_text("utf-16")
pattern = re.compile(r"\$hardcodedDestinasi = \[\r?\n(?:.*?\r?\n)*?\s*\];\r?\n", re.S)
text2 = pattern.sub("        $hardcodedDestinasi = [];\n", text)
text2 = text2.replace("'Desa Meat'", "'-'")
text2 = text2.replace('Desa Meat', '-')
text2 = text2.replace('Pantai Meat', '')
text2 = text2.replace('Spot Pantai Meat', '')
text2 = text2.replace('Homestay Meat', '')
text2 = text2.replace('Gua Liang Sipege', '')
text2 = text2.replace('Batu Basiha', '')
text2 = text2.replace('meat/', '')
if text2 != text:
    p.write_text(text2, 'utf-16')
    print('modified')
else:
    print('unchanged')
print('Meat' in text2, 'Sipege' in text2, 'Basiha' in text2)
