package w11_DB;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;

public class Test {	
	private static String className = "oracle.jdbc.driver.OracleDriver";
	private static String url = "jdbc:oracle:thin:@localhost:1521:xe";
	private static String user = "hr";
	private static String password = "1234";
	
	public static Connection getConn() {
		Connection conn = null;
		
		try {
			Class.forName(className);
			conn = DriverManager.getConnection(url, user, password);			
			System.out.println("connection success");
		} catch (ClassNotFoundException | SQLException e) {
			System.out.println("connection fail");
			e.printStackTrace();
		}
		
		return conn;
	}
	
	public void closeAll(Connection conn, PreparedStatement pstm, ResultSet rs) {
		try {
			if (rs != null) rs.close();
			if (pstm != null) pstm.close();
			if (conn != null) conn.close();
			System.out.println("connection closed");
		} catch (SQLException sqle) {
			System.out.println("error");
			sqle.printStackTrace();
		}
	}
	
	private void select() {
		Connection conn = null;
		PreparedStatement pstm = null;
		ResultSet rs = null;
		String sql = "select * from ( select * from jobs order by rownum desc ) where rownum = 1";		
		try {
			conn = getConn();
			pstm = conn.prepareStatement(sql);
			rs = pstm.executeQuery(sql);	
			int count = 0;
			
			while(rs.next()) {
				System.out.print("\njob_id: " + rs.getString("job_id"));
				System.out.print("\tjob_title: " + rs.getString("job_title"));
				System.out.print("\tmin_salary: " + rs.getString("min_salary"));
				System.out.println("\tmax_salary: " + rs.getString("min_salary"));
				count = count + 1;
			}			
			System.out.println(count + " row selected\n");									
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, rs);			
		}
	}
	private void update() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "update jobs set min_salary = 5000 where job_id = 'ad_pres'";		
		try {
			conn = getConn();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate(sql);
			System.out.println(count + " row updated");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}
	private void insert() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "insert into jobs values ('AD_REP', 'Administration Accountant', '6000', '20000')";
		
		try {
			conn = getConn();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate(sql);
			System.out.println(count + " row inserted");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}
	
	private void delete() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "delete from jobs where job_id = 'AD_REP'";
		
		try {
			conn = getConn();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate(sql);
			System.out.println(count + " row deleted");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}	
	
	public static void main(String[] args) {
		Test so = new Test();		
		so.select();
		so.insert();
		so.select();
		so.update();
		so.select();
		so.delete();
		so.select();
	}
}
