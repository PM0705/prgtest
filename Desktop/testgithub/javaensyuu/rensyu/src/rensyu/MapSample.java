package rensyu;
import java.util.HashMap;
import java.util.Map;


public class MapSample {

	
	public static void main(String[]args) {
		Map<String,String>map = new HashMap<String,String>();
		
		
		
//		値の記憶はputメソッドを利用
		map.put("key1", "value1");
		map.put("key2", "value2");
		map.put("key3", "value3");
		map.put("key4", "value4");
		map.put("key5", "value5");
		
//		値の取得.存在しない value1 が取得できる
		String value = map.get("key1");
		System.out.println(value);
//		値の取得.存在しない key の場合は null
		String valueNull = map.get("key6");
		System.out.println(valueNull);
		
//		map に該当するkey が存在するか否かチェックすることも可能
		if(map.containsKey("key1")) {
			System.out.println("key1は存在します");
		}else {
			System.out.println("key1は存在しません");
		}
		
//		拡張for文を利用してすべての情報を取得、
		for(Map.Entry<String,String>e:map.entrySet()) {
			System.out.println(e.getKey() + ":" + e.getValue());
			
		}
		
		
	}
	
}
